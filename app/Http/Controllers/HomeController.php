<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index () {
        $data = "Ini data dari Controller";
        return view('welcome', compact('data'));
    }
}
