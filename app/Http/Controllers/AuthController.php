<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  Request  $request
     * @return View|Response|RedirectResponse
     */
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $credentials = $request->validate([
                'mobile' => ['required'],
                'password' => ['required'],
            ]);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return redirect()->intended('/');
            }

            return back()->withErrors([
                'mobile' => 'The provided credentials do not match our records.',
            ]);
        }

        return view('auth/login');
    }

    /**
     * Log the user out of the application.
     *
     * @param  Request  $request
     * @return Response|RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * @param Request $request
     * @return View|RedirectResponse
     */
    public function register(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => ['required'],
                'mobile' => ['required'],
            ]);
            $isUser = User::where('mobile', $request->post('mobile'))->first();
            if(!empty($isUser)){
                return redirect()->route('auth.login')->withErrors([
                    'mobile' => 'Daha önce kayıt olmuşsunuz. İlk gelen şifre ile giriş yapmayı deneyiniz. Sorun yaşamanız halinde canlı destek üzerinden bize ulaşabilirsiniz.',
                ]);
            }

            $password = rand(100000, 999999);

            Log::info('---------------------------------------------------------------------------------------------------------------------');
            Log::info($password);
            Log::info($request->post('name'),);
            Log::info($request->post('mobile'),);
            Log::info('---------------------------------------------------------------------------------------------------------------------');


            if ($this->sendSMS($request->post('mobile'), $password)) {
                $hashed = Hash::make($password);
                $user = User::create([
                    'name' => $request->post('name'),
                    'mobile' => $request->post('mobile'),
                    'password' =>  $hashed
                ]);

                return redirect()->route('auth.login');
            }
        }

        return view('auth/register');
    }

    /**
     * @param Request $request
     * @return View|RedirectResponse
     */
    public function resetPassword(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'mobile' => ['required'],
            ]);
            $user = User::where('mobile', $request->post('mobile'))->first();
            if(empty($user)){
                return redirect()->route('auth.login')->withErrors([
                    'mobile' => 'Daha önce kayıt olmamamışsınız. Lütfen önce hesap oluşturunuz. Sorun yaşamanız halinde canlı destek üzerinden bize ulaşabilirsiniz.',
                ]);
            }

            $password = rand(100000, 999999);

            if ($this->sendSMS($request->post('mobile'), $password)) {
                $hashed = Hash::make($password);
                $user->password = $hashed;
                $user->save();

                return redirect()->route('auth.login');
            }
        }

        return view('auth/reset-password');
    }


    function sendSMS($mobile, $password){
        $netGSMUsercode = '2323320497';
        $netGSMPassword = urlencode('M3.14f5C');
        $message = urlencode("Kuzeyde Yarıyıl hesabınız oluşturulmuştur. Giriş bilgileriniz
        Telefon: {$mobile}
        Şifre: {$password}
        Kuzeyde Yarıyıl Görüşmek Üzere...");
        $title = urlencode('Agora RAC');
        $url = "https://api.netgsm.com.tr/sms/send/get/?usercode={$netGSMUsercode}&password={$netGSMPassword}&gsmno={$mobile}&message={$message}&msgheader={$title}&dil=TR";

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $http_response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if($http_code != 200){
            return false;
        }

        // return $http_response;
        return true;
    }

}
