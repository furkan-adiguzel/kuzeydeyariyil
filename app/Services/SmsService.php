<?php

namespace App\Services;

class SmsService
{

    public function send($mobile, $message){
        try {
            $netGSMUsercode = '2666060795';
            $netGSMPassword = urlencode('-K7U5.W.');
            $title = '02666060795';

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

            if ($http_code != 200) {
                return false;
            }

            // return $http_response;
            return true;
        } catch (\Throwable $e) {
            report($e);
            return null;
        }

    }
}
