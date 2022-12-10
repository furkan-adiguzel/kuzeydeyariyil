<?php

namespace App\Http\Controllers;

use App\Enums\Clubs;
use App\Models\Attender;
use App\Models\Package;

class HomeController extends Controller
{
    public function coming() {
        return view('coming-soon');
    }

    public function index() {
        $clbs = Attender::where('club', '!=', 1)->get()->countBy('club')->sort()->reverse();
        $clubs = $clbs->take(5)->toArray();

        if (isset(array_keys($clubs)[0])) {
            unset($clubs[array_keys($clubs)[0]]);
        }

        $firstClub =$clbs->take(1)->toArray();
        $allClubs = Clubs::getClubs();

        return view('home', [
            'clubs' => $clubs,
            'firstClub' => $firstClub,
            'allClubs' => $allClubs,
        ]);
    }

    public function committee() {
        return view('committee/committee');
    }

    public function committeeDetail($slug) {
        return view('committee/'.$slug);
    }

    public function hotel() {
        return view('hotel');
    }

    public function packages() {
        $packages = Package::all()->sortBy('id');
        return view('packages', ['packages' => $packages]);
    }

    public function kvkk() {
        return view('kvkk');
    }

    public function sponsors() {
        return view('sponsors');
    }

    public function program() {
        return view('program');
    }
}
