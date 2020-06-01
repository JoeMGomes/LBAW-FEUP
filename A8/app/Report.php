<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    // Don't add create and update timestamps in database.
    public $timestamps  = false;
    protected $table = 'report';

    public function create($data){
        DB::insert('INSERT 
        into report (reported, reporter, type, offense)
        values (:reported, :reporter, :type, :offense)', 
        [
        'reported' => $data['reported'],
        'reporter' => $data['reporter'],
        'type' => $data['type'],
        'offense' => $data['offense'],
        ]);
    }
}
