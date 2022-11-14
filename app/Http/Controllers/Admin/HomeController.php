<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attender;
use App\Models\Package;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.home.index', [
            'userCount' => User::count(),
            'attenderCount' => Attender::count(),
            'roomCount' => Room::count(),
            'packageCount' => Package::count(),
        ]);
    }
}
