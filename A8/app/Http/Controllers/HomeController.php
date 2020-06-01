<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class HomeController extends Controller
{
    public function showHome()
    {
        $cat = new Category();
        $categories = $cat->categories();
        return view('pages.home', ['categories' => $categories]);
        
    }

    public function showAbout()
    {
        return view('pages.about');
    }
}
