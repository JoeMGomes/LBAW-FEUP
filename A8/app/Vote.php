<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Auth;

class Vote extends Model
{
    public function answer()
    {
        return $this->hasOne('App\Answer', 'answer');
    }

    public function upvote($answer) {
        $votes = DB::select("select add_upvote(:answer, :member)", ['answer' => $answer, 'member' => Auth::user()->id]);
        return collect($votes)->map(function($x) {return (array) $x; })->toArray();
    }

    public function downvote($answer) {
        $votes = DB::select("select add_downvote(:answer, :member)", ['answer' => $answer, 'member' => Auth::user()->id]);
        return collect($votes)->map(function($x) {return (array) $x; })->toArray();
    }
}
