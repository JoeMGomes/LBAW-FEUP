<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Auth;
class Bookmark extends Model
{
    public function getBookmarks()
    {
        $result = DB::select(
            DB::raw("select q.id, q.date as qdate, text_body, title, q.name as qname, q.photo_url as qphoto, 
        a.reported as areported, a.answer, a.date as adate, a.name as aname, a.photo_url as aphoto, a.membership_date, a.score 
 from (total_question as q LEFT JOIN total_answer as a ON q.best_answer = a.id), bookmark as b
 where q.reported = false and b.member = :id and q.id = b.bookmark"),
            array("id" => Auth::user()->id)
        );
        return collect($result)->map(function ($x) {
            return (array) $x;
        })->toArray();
    }


    public function addBook($bookmark)
    {
        if(Auth::check()){
            DB::insert('INSERT into bookmark (member, bookmark)  values (:id, :question) ', [
                'id' => Auth::user()->id,
                'question' => $bookmark
            ]);
        }
    }

    public function removeBook($bookmark)
    {
        if(Auth::check()){
            DB::delete('DELETE from bookmark where  member = :id AND bookmark = :question', [
                'id' => Auth::user()->id,
                'question' => $bookmark
            ]);
        }
    }
}
