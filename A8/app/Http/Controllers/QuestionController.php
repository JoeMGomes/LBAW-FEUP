<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function addQuestion(){
        return view('pages.newQuestion');
    }


    public function store(Request $request){

        DB::select('SELECT add_question(:param1, :param2, :param3)', [
        'param1' => Auth::user()->id, 
        'param2' => $request->input('text_body'), 
        'param3' => $request->input('title')]);
        return redirect('/');
    }
}
