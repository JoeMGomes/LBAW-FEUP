<?php

namespace App\Http\Controllers;

use App\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{

    public function upvote(Request $request) {
        if (Auth::check()) {
            $answer_id = $request->input('message');
            $votes =  (new Vote)->upvote($answer_id);
            return response()->json(['votes' => $votes[0]['add_upvote'], 'id' => $answer_id]);
        }
    }

    public function downvote(Request $request) {
        if (Auth::check()) {
            $answer_id = $request->input('message');
            $votes = (new Vote)->downvote($answer_id);
            return response()->json(['votes' => $votes[0]['add_downvote'], 'id' => $answer_id]);
        }
    }
}
