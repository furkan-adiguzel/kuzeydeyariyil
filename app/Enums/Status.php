<?php
/**
 * Created by PhpStorm.
 * User: Pekersson
 * Date: 17.01.2020
 * Time: 13:36
 */

namespace App\Enums;


class Status

{
    const Onaylanmadı = 1;
    const Rezervasyon = 2;
    const Onaylandi = 3;


    public static function getStatus()
    {
        return [
            1 => 'Onaylanmadı',
            2 => 'Rezervasyon',
            3 => 'Onaylandı',

        ];
    }

    public static function allKeys(){
        return [
            static::Onaylanmadı,
            static::Rezervasyon,
            static::Onaylandi,

        ];
    }
}
