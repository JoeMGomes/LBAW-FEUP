<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Question;

class HomeController extends Controller
{
    public function showHome()
    {
        $cat = new Category();
        $categories = $cat->categories();
        $question = new Question();
        $posts = $question->popularQuestions();
        return view('pages.home', ['categories' => $categories, 'posts' => $posts]);
        
    }

    public function showAbout()
    {
        return view('pages.about');
    }
}
