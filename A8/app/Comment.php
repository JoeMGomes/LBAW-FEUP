<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // Don't add create and update timestamps in database.
    public $timestamps  = false;
    protected $table = 'comment';

public function create($data){
    DB::select('SELECT add_comment(:param1, :param2, :param3)', [
        'param1' => $data['id'], 
        'param2' => $data['text_body'], 
        'param3' => $data['answer_id']]);
}

    public function updateText(Request $request){
        DB::select("UPDATE post SET text_body = :newtext WHERE id = :id;",  [
            'newtext' => $request->input('text_body'), 
            'id' => $request->input('commentID')]);
    }
}
