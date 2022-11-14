<?php
/**
 * Created by PhpStorm.
 * User: Pekersson
 * Date: 27.12.2019
 * Time: 11:37
 */

namespace App\Enums;


abstract  class Role
{
    const Baskan = 1;
    const Asbaskan = 2;
    const Sekreter = 3;
    const Sayman = 4;
    const BRT = 5;
    const GBRT = 6;
    const BG = 7;
    const GDB = 8;
    const KB = 9;
    const Uye = 11;
    const Misafir= 12;
    const Rotaryen= 13;
    const Emekli= 14;

    public static function getRole()
    {
        return [
            5 => 'Bölge Rotaract Temsilcisi',
            6 => 'Geçmiş Dönem Bölge Rotaract Temsilcisi',
            7 => 'Bölge Görevlisi',
            1 => 'Başkan',
            2 => 'Asbaşkan',
            3 => 'Sekreter',
            4 => 'Sayman',
            8 => 'Geçmiş Dönem Başkanı',
            9 => 'Komite Başkanı',
            11 => 'Üye',
            12 => 'Misafir',
			13 => 'Rotaryen',
			14 => 'Emekli'
        ];
    }

    public static function allKeys(){
        return [
            static::Baskan,
            static::Asbaskan,
            static::Sekreter,
            static::Sayman,
            static::BRT,
            static::GBRT,
            static::BG,
            static::GDB,
            static::KB,
            static::Uye,
            static::Misafir,
            static::Rotaryen,
            static::Emekli
        ];
    }
}