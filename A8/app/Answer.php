<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    // Don't add create and update timestamps in database.
    public $timestamps  = false;
    protected $table = 'total_answer';

    public function votes()
    {
        return $this->hasMany('App\Vote');
    }
}
