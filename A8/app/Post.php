<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';


    protected $fillable = [
        'author', 'date', 'text_body'
    ];

    public function author() {
        return $this->belongsTo('App\Member', 'author');
    }


}
