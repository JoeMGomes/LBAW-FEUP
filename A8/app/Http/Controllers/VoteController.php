<?php

namespace App\Http\Controllers;

use App\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class VoteController extends Controller
{

    public function upvote(Request $request) {
        if (Auth::check()) {
            $answer_id = $request->input('message');
            $votes = DB::select("select add_upvote(:answer, :member)", ['answer' => $answer_id, 'member' => Auth::user()->id]);
            $votes = collect($votes)->map(function($x) {return (array) $x; })->toArray();
            return response()->json(['votes' => $votes[0]['add_upvote'], 'id' => $answer_id]);
        }
    }

    public function downvote(Request $request) {
        if (Auth::check()) {
            $answer_id = $request->input('message');
            $votes = DB::select("select add_downvote(:answer, :member)", ['answer' => $answer_id, 'member' => Auth::user()->id]);
            $votes = collect($votes)->map(function($x) {return (array) $x; })->toArray();
            return response()->json(['votes' => $votes[0]['add_downvote'], 'id' => $answer_id]);
        }
    }
}
