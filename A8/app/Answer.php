<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Http\Request;

class Answer extends Model
{
    // Don't add create and update timestamps in database.
    public $timestamps  = false;
    protected $table = 'total_answer';

    public function votes()
    {
        return $this->hasMany('App\Vote');
    }

    public function updateText(Request $request){
        DB::select("UPDATE post SET text_body = :newtext WHERE id = :id;",  [
            'newtext' => $request->input('text_body'), 
            'id' => $request->input('answerID')]);
    }

    public function deleteAns(Request $request){
        DB::select("DELETE from answer  WHERE post = :id",  [
            'id' => $request->input('answerID')]);

        DB::select("DELETE from post  WHERE id = :id",  [
                'id' => $request->input('answerID')]);
    }
}