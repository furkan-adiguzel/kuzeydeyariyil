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
        unset($clubs[5]);
        unset($clubs[12]);

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
        $attenderCount = Attender::all()->count();


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
            'positions' => $positions,
            'attenderCount' => $attenderCount,
        ]);
    }



    function sendSMS($mobile, $name){
        $netGSMUsercode = '2666060795';
        $netGSMPassword = urlencode('-K7U5.W.');
        $title = '02666060795';
        $message = "{$name} Kuzeyde Yariyil Zirvesi kaydiniz alinmistir. Diger islemler icin sifreye ihtiyaciniz olacak. Tekrar gorusmek uzere...";

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.netgsm.com.tr/sms/send/get',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'usercode' => $netGSMUsercode,
                'password' => $netGSMPassword,
                'gsmno' => $mobile,
                'message' => $message,
                'msgheader' => $title,
                'filter' => '0',
                'startdate' => '',
                'stopdate' => ''),
        ));

        $response = curl_exec($curl);
        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);

        if($http_code != 200){
            return false;
        }

        // return $http_response;
        return true;
    }

}
