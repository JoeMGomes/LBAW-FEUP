<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Comment extends Model
{
    // Don't add create and update timestamps in database.
    public $timestamps  = false;
    protected $table = 'comment';

    protected $primaryKey = 'post';

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

    public function deleteCom(Request $request){
        DB::select("SELECT delete_comment(:id)",  [
            'id' => $request->input('commentID')]);
    }

    public function answer(){
        return $this->belongsTo('App\Answer','post');
    }
}
