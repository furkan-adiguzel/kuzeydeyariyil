<?php

namespace App\Http\Controllers;

use App\Enums\Clubs;
use App\Enums\Role;
use App\Models\Attender;
use App\Models\Package;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AttendController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  Request  $request
     * @return View|Response|RedirectResponse
     */
    public function attenders(Request $request)
    {
        $attenders = Attender::all();

        $clubs = Attender::all()->countBy('club')->sort()->reverse();
        unset($clubs[1]);

        $groupedList = [];
        foreach ($attenders as $attender) {
            $clubId = (int) $attender->club;
            $groupedList[$clubId][] = $attender;
        }

        return view('attend/attenders', [
            'clubs' => $clubs,
            'groupedList' => $groupedList
        ]);
    }


    /**
     * @param  Request  $request
     * @return View|Response|RedirectResponse
     */
    public function register(Request $request)
    {
        if (Auth::user()->attender && !Auth::user()->getIsAdmin()) {
            return redirect()->route('attenders');
        }

        $packages = Package::all();
        $clubs = Clubs::getClubs();
        $positions = Role::getRole();


        if ($request->isMethod('post')) {
            $request->validate([
                'name' => ['required'],
                'mobile' => ['required'],
            ]);


            $path = $request->file('receipt')->store('receipt');

            $attender = new Attender();
            $attender->name = $request->post('name');
            $attender->surname = $request->post('surname');
            $attender->mobile = $request->post('mobile');
            $attender->identity = $request->post('identity');
            $attender->club = $request->post('club');
            $attender->position = $request->post('position');
            $attender->package_id = $request->post('package');
            $attender->user_id = Auth::id();
            /*$attender->roommate_1_fullname = $request->post('roommate_1_fullname');
            $attender->roommate_1_mobile = $request->post('roommate_1_mobile');
            $attender->roommate_2_fullname = $request->post('roommate_2_fullname');
            $attender->roommate_2_mobile = $request->post('roommate_2_mobile');*/
            $attender->reference = $request->post('reference');
            $attender->status = 1;
            $attender->receipt_1 = $path;
            $attender->paid_1_date = Carbon::now();
            $attender->save();
            /*
            $isExistAttender = Attender::where('roommate_1_mobile', $attender->mobile)
                ->orWhere('roommate_2_mobile', $attender->mobile)
                ->first();

            //dd($isExistAttender);

            if (!$isExistAttender) {
                $room = new Room();
                $room->attenders_1 = $attender->mobile;
                $room->attenders_1_club = $attender->club;

                if ($attender->roommate_1_mobile) {
                    $room->attenders_2 = $attender->roommate_1_mobile;
                }

                if ($attender->roommate_2_mobile) {
                    $room->attenders_3 = $attender->roommate_2_mobile;
                }

                $room->package_id = $attender->package_id;

                $room->save();
            }*/
            $this->sendSMS($request->post('mobile'), $attender->name);

            return redirect()->route('attenders');

        }

        return view('attend/register', [
            'packages' => $packages,
            'clubs' => $clubs,
            'positions' => $positions
        ]);
    }



    function sendSMS($mobile, $name){
        $netGSMUsercode = '2323320497';
        $netGSMPassword = urlencode('M3.14f5C');
        $message = urlencode("{$name} Geleceğin Asamblesine kaydınız alınmıştır. Diğer işlemler için şifreye ihtiyacınız olacak. Tekrar görüşmek Üzere...");
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
