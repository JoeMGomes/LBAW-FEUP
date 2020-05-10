<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Question;
use App\Category;

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
        $ob = new Category();
        $response = $ob->allCategories("");

        if( !in_array($request->input('category'), $response)){
            back()->with('errorMessage',$request->input('category') + ' is not a valid categoty!' );
        }else{
            $this->authorize('create', Question::class);

            DB::select('SELECT add_question(:param1, :param2, :param3)', [
            'param1' => Auth::user()->id, 
            'param2' => $request->input('text_body'), 
            'param3' => $request->input('title')]);
            return redirect('/');
        }
        
    }

}
