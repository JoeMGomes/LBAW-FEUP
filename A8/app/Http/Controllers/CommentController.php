<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }

    public function addComment(Request $request){
        $ob = new Comment();

        $input['id'] = Auth::user()->id;
        $input['text_body'] = $request->input('comment_body');
        $input['answer_id'] = $request->input('answer_id');

        $response = $ob->create($input);

        return redirect()->back();
    }

    public function deleteComment(Request $request)
    {
        if ((Auth::check() && Auth::user()->id == $request->input('owner')) || Auth::guard('admin')->check()){
            $obj = new Comment();
            $obj->deleteCom($request);
            return redirect()->back();
        }
    } 

    public function edit(Request $request)
    {
        $obj = new Comment();
        $obj->updateText($request);
        return redirect()->back();
    }

}
