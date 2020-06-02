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
        $result = DB::select('SELECT id, name, color FROM category WHERE name ILIKE :input', ['input' => $input."%"]);
        return collect($result)->map(function($x) {return (array) $x; })->toArray();
    }

    public function create($data){
        DB::insert('INSERT into category (name, color) values (:name, :color)', ['name' => $data['name'], 'color' => $data['color']]);
    }

    public function deleteCateg($data){
        DB::delete('DELETE From category where name = :name', ['name' => $data['name']]);
    }

    public function updateCateg($data){
        DB::update('UPDATE category set name = :name, color= :color where id = :id', [
            'name' => $data['name'],
            'color' => $data['color'],
            'id' => $data['id'],
        ]);
    }

    public function categories() {
        $result = DB::select('SELECT name FROM category order by name');
        return collect($result)->map(function($x) {return ((array) $x)['name']; })->toArray();
    }
    
}
