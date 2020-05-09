<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordReset extends Controller
{

    public function reset(){
        return redirect()->route('home');
    }
}
