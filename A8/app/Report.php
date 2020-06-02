<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    // Don't add create and update timestamps in database.
    public $timestamps  = false;
    protected $table = 'report';

    protected $fillable = [
        'id','date', 'reported', 'reporter','type', 'offense','state'
    ];

    /**
     * Inserts a new report in the database
     */
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

    public function getReportsForAdmin(){
        return DB::select('SELECT r.id, u.name, r.date,  type, p.text_body, r.offense 
                        FROM report as r, post as p, member as u 
            WHERE state = \'Unread\' AND p.id = r.reported AND p.author = u.id');
    }

    public function setState($data){
        DB::update('UPDATE report set state = :state where id = :id', 
        ['state' => $data['state'],
        'id' => $data['id']
        ]);
    }
}
