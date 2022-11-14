<?php

namespace App\Services;

class SmsService
{

    public function send($number, $message){
        $netGSMUsercode = '2323320497';
        $netGSMPassword = urlencode('M3.14f5C');
        $title = urlencode('Agora RAC');
        $message = urlencode($message);
        $url = "https://api.netgsm.com.tr/sms/send/get/?usercode={$netGSMUsercode}&password={$netGSMPassword}&gsmno={$number}&message={$message}&msgheader={$title}&dil=TR";

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $http_response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($http_code != 200){
            return false;
        }

        // return $http_response;
        return true;
    }
}
