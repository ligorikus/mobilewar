<?php

namespace App\Http\Controllers;

use App\Model\GameResource;
use App\Model\MapField;
use App\Model\MapFieldResource;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     */
    public function index()
    {
        return view('index');
    }
}
