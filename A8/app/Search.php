<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Search extends Model
{
    public $timestamps  = false;
    protected $table = "total_question";

    public function search($search) {
        $result = DB::select(DB::raw("select *, ts_rank_cd(textsearch, query) AS rank 
                                    from total_question, to_tsquery(:search) AS query, to_tsvector(title || ' ' || text_body) AS textsearch
                                    where query @@ textsearch
                                    order by rank desc"),
                        array("search" => $search,));
        return collect($result)->map(function($x) {return (array) $x; })->toArray();
    }
}
