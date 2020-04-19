<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'title'
    ];
    protected $table = 'question';

    public function post()
    {
        return $this->hasOne('App\Post', 'post');
    }
}
