<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Question;
use App\Category;

class QuestionController extends Controller
{
    private function checkcategory($categ){
        $ob = new Category();
        $response = $ob->allCategories("");
        for($i = 0; $i < count($response); ++$i){
            if ($response[$i]['name'] == $categ){
                return true;
            }
        }
        return false;
    }

    public function addQuestion(){

        if (Auth::check()) {
            return view('pages.newQuestion');
        } else{
            return redirect('login');
        }
    }


    public function store(Request $request){
        $check = false;
        $catArray = array();
        $title = $request->input('title');
        $textBody = $request->input('text_body');

        $noDupArray = array_unique($request->input());

        for($i = 1; $i <= 5; $i++){
            if (array_key_exists('category'.$i, $noDupArray)){

                if(!$this->checkcategory($noDupArray['category'.$i]) && $noDupArray['category'.$i] != ''){
                    return back()->with('errorMessage' , $noDupArray['category'.$i].' is not a valid category!'.$noDupArray['category'.$i]);
                }
                if($request->input('category'.$i)  != ''){
                    array_push($catArray, $noDupArray['category'.$i]);
                    $check = true;
                }
            }

        }
        if (!$check){
            return back()->with('errorMessage' , 'Please insert a valid category!');
        }
            $this->authorize('create', Question::class);

            $id = DB::select('SELECT add_question(:param1, :param2, :param3)', [
            'param1' => Auth::user()->id, 
            'param2' => $textBody, 
            'param3' => $title]);
            $id = collect($id)->map(function($x) {return (array) $x; })->toArray();
            $questionid = $id[0]['add_question'];
            
            for ($i = 0; $i < count($catArray); $i++){
                DB::select('insert into question_category(question, category) values (:question, (select id from category where name = :catid));', [
                    'question' => $questionid,
                    'catid'  => $catArray[$i]]);
            }
            return redirect('/post/'.$questionid);
    }

    public function view($question) {
        $obj = new Question();
        $info = $obj->getAllInfo($question);
        if ($info['question']['reported'])
            return redirect('home');
        return view('pages.question', ['question' => $info['question'], 'answers' => $info['answers'] ]);
    }

    public function addAnswer(Request $request){
        DB::select('SELECT add_answer(:param1, :param2, :param3)', [
            'param1' => Auth::user()->id, 
            'param2' => $request->input('text_body'), 
            'param3' => $request->input('question_id')]);
            return redirect('/post/'. $request->input('question_id'));
    }

    public function chooseBestAnswer(Request $request) {
        $question = $request->input('question'); 
        $answer = $request->input('answer');
        DB::select(DB::raw('update question set best_answer = :answer where post = :question'),
         ['question' => $question, 'answer' => $answer]);
    }

    public function deleteQuestion(Request $r) {
        $question = $r->input('id');
        DB::select(DB::raw('select delete_question(:question)'), 
            ['question' => $question]);
        return redirect('/');
    }
}
