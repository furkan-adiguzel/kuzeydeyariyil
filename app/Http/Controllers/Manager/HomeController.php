<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Attender;

class HomeController extends Controller
{
    public function index()
    {
        return view('manager.home.index', [
            'attenderCount' => Attender::count(),
        ]);
    }
}
