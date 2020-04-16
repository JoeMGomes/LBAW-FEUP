<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showHome()
    {
        return view('pages.home');
        
    }

    public function showAbout()
    {
        return view('pages.about');
    }
}
