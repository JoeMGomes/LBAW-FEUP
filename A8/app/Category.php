<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Category extends Model
{
    protected $fillable = [
        'name', 'color'
    ];


    public function allCategories($input){
        $result = DB::select('SELECT name FROM category WHERE name ILIKE :input', ['input' => $input."%"]);
        return collect($result)->map(function($x) {return (array) $x; })->toArray();
    }
}
