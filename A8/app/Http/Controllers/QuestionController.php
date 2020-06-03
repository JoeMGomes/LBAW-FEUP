<?php

namespace App\Http\Controllers;

use App\Answer;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Question;
use App\Category;
use App\Comment;

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

        //Verifies if the passed Categories match all requirements
        for($i = 1; $i <= 5; $i++){
            if (array_key_exists('category'.$i, $noDupArray)){

                if(!$this->checkcategory($noDupArray['category'.$i]) && $noDupArray['category'.$i] != ''){
                    return back()->withInput()->with('errorMessage' , $noDupArray['category'.$i].' is not a valid category!'.$noDupArray['category'.$i]);
                }
                if($request->input('category'.$i)  != ''){
                    array_push($catArray, $noDupArray['category'.$i]);
                    $check = true;
                }
            }

        }
        if (!$check){
            return back()->withInput()->with('errorMessage' , 'Please insert a valid category!');
        }
            $this->authorize('create', Question::class);

            $obj = new Question();
            $id = $obj->addQuestion($title, $textBody);
            $id = collect($id)->map(function($x) {return (array) $x; })->toArray();
            $questionid = $id[0]['add_question'];
            
            for ($i = 0; $i < count($catArray); $i++){
                $obj->addCategory($questionid, $catArray[$i]);
            }
            return redirect('/post/'.$questionid);
    }

    public function fillSlug($question) {

        $id = $question;
        $que = Question::find($question);

        //Finds the parent Question of a Post
        if(!Question::where('post','=',$id)->exists()){
            $comment = Comment::find($id);
            $answer = Answer::find($id);

            if($comment){
                $ans = Answer::find($comment->answer);
                $que = Question::find($ans->question);
                $id = $que->post;
            } else if($answer){
                $que = Question::find($answer->question);
                $id = $que->post;
            } else{
                abort(404);
            }
        }

        //Fills the url with the question title for cleaner urls
        $slug = Str::slug( $que->title,'-');   
        return redirect('/post/'.$id.'/'.$slug);
        
    }

    public function view($id){
        $obj = new Question();
        $info = $obj->getAllInfo($id);
        if ($info['question']['reported'])
            return redirect('home');
        return view('pages.question', ['question' => $info['question'], 'answers' => $info['answers'] ]);
    }

    public function addAnswer(Request $request){
        $obj = new Question();
        $obj->addAnswer($request);
            return redirect('/post/'. $request->input('question_id'));
    }

    public function chooseBestAnswer(Request $request) {
        $obj = new Question();
        $obj->addbestAnswer($request);
    }

    public function deleteQuestion(Request $r) {
        $obj = new Question();
        $obj->delQuestion($r);
        return redirect('/');
    }

    public function edit(Request $request)
    {
        $obj = new Question();
        $obj->updateQuestion($request);
        return redirect()->back()->with('successMessage','Question edit successfully!');
    }

}


