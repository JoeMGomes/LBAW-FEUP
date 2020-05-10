<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Question;

class QuestionController extends Controller
{
    public function addQuestion(){

        if (Auth::check()) {
            return view('pages.newQuestion');
        } else{
            return redirect('login');
        }
    }

    public function store(Request $request){

        $this->authorize('create', Question::class);

        DB::select('SELECT add_question(:param1, :param2, :param3)', [
        'param1' => Auth::user()->id, 
        'param2' => $request->input('text_body'), 
        'param3' => $request->input('title')]);
        return redirect('/');
    }

    public function view($question) {
        $obj = new Question();
        $info = $obj->getAllInfo($question);
        return view('pages.question', $info);
    }
}
