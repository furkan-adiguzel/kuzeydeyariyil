<?php
/**
 * Created by PhpStorm.
 * User: Pekersson
 * Date: 27.12.2019
 * Time: 18:13
 */

namespace App\Enums;


abstract class Clubs
{
   const Agora= 1;
   const Alsancak = 2;
   const Bademli= 3;
   const Balcova = 4;
   const Balikesir =5 ;
   const Bornova = 8;
   const Bostanli = 9;
   const Buca = 10;
   const Bursa = 11;
   const Canakkale = 12;
   const Cekirge = 13;
   const Cigli = 14;
   const Deliklicinar = 15;
   const Denizli = 16;
   const Didim =17;
   const DokuzEylul = 18;
   const Efes = 19;
   const Ege = 20;
   const Goztepe = 22;
   const Guzelbahce = 23;
   const Guzelyali = 24;
   const Inegol = 25;
   const IzmirEkonomi = 26;
   const Izmir = 27;
   const Karsiyaka = 28;
   const Konak = 29;
   const Kordon = 30;
   const Magnesia = 31;
   const Marmaris = 32;
   const Mavisehir = 33;
   const Nilufer = 34;
   const Osmangazi =35;
   const SalihliSardes =36;
   const Smyrna = 37;
   const Tophane = 38;
   const Urla = 40;
   const YildirimBeyazid = 41;
   const Rotary = 42;
   const Diger = 43;
   const Gokdere = 44;
   const Calikusu = 45;
   const Bodrum = 46;
   const Muradiye = 47;

   public static function getClubs()
   {
       return [
           1 => 'Agora Rotaract Kulübü',
           2 => 'Alsancak Rotaract Kulübü',
           3 => 'Bademli Rotaract Kulübü',
           4 => 'Balçova Rotaract Kulübü',
           5 => 'Balıkesir Rotaract Kulübü',
           46 => 'Bodrum Rotaract Kulübü',
           8 => 'Bornova Rotaract Kulübü',
           9 => 'Bostanlı Rotaract Kulübü',
           10 => 'Buca Rotaract Kulübü',
           11 => 'Bursa Rotaract Kulübü',
           12 => 'Çanakkale Rotaract Kulübü',
           45 => 'Çalıkuşu Rotaract Kulübü',
           13 => 'Çekirge Rotaract Kulübü',
           14 => 'Çiğli Rotaract Kulübü',
           15 => 'Delikliçınar Rotaract Kulübü',
           16 => 'Denizli Rotaract Kulübü',
           17 => 'Didim Rotaract Kulübü',
           18 => 'Dokuz Eylül Rotaract Kulübü',
           19 => 'Efes Rotaract Kulübü',
           20 => 'Ege Rotaract Kulübü',
           44 => 'Gökdere Rotaract Kulübü',
           22 => 'Göztepe Rotaract Kulübü',
           23 => 'Güzelbahçe Rotaract Kulübü',
           24 => 'Güzelyalı Rotaract Kulübü',
           25 => 'İnegöl Rotaract Kulübü',
           26 => 'İzmir Ekonomi Rotaract Kulübü',
           27 => 'İzmir Rotaract Kulübü',
           28 => 'Karşıyaka Rotaract Kulübü',
           29 => 'Konak Rotaract Kulübü',
           30 => 'Kordon Rotaract Kulübü',
           31 => 'Magnesia Rotaract Kulübü',
           32 => 'Marmaris Rotaract Kulübü',
           33 => 'Mavişehir Rotaract Kulübü',
           47 => 'Muradiye Rotaract Kulübü',
           34 => 'Nilüfer Rotaract Kulübü',
           35 =>  'Osmangazi Rotaract Kulübü',
           36 => 'Salihli Sardes Rotaract Kulübü',
           37 => 'Smyrna Rotaract Kulübü',
           38 => 'Tophane Rotaract Kulübü',
           40 => 'Urla Rotaract Kulübü',
           41 =>  'Yıldırım Beyazıd Rotaract Kulübü',
           42 =>  'Rotary Kulübü',
           43 =>  'Diğer'
       ];
   }
   public static function allKeys(){
       return [
            static::Agora,
            static::Alsancak,
            static::Bademli,
            static::Balcova,
            static::Balikesir,
            static::Bornova,
            static::Bostanli,
            static::Buca,
            static::Bursa,
            static::Canakkale,
            static::Cekirge,
            static::Cigli,
            static::Deliklicinar,
            static::Denizli,
            static::Didim,
            static::DokuzEylul,
            static::Efes,
            static::Ege,
            static::Goztepe,
            static::Guzelbahce,
            static::Guzelyali,
            static::Inegol,
            static::IzmirEkonomi,
            static::Izmir,
            static::Karsiyaka,
            static::Konak,
            static::Kordon,
            static::Magnesia,
            static::Marmaris,
            static::Mavisehir,
            static::Nilufer,
            static::Osmangazi,
            static::SalihliSardes,
            static::Smyrna,
            static::Tophane,
            static::Urla,
            static::YildirimBeyazid,
            static::Rotary,
            static::Diger,
            static::Gokdere,
            static::Calikusu,
            static::Bodrum,
            static::Muradiye
       ];
   }
}
