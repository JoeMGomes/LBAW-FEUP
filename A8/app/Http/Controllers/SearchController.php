<?php

namespace App\Http\Controllers;

use App\Search;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Search  $search
     * @return \Illuminate\Http\Response
     */
    public function show($search)
    {
        $obj = new Search();
        $pos = strpos($search, "#");
        
        if ($pos === false) {
            $results = $obj->search($search);
        }
        elseif ($pos == 0) {
            $results = $obj->searchCategory(substr($search, 1));
        }
        else {
            $search1 = substr($search, 0, $pos);
            $category = substr($search, $pos+1);
            
            $results = $obj->searchWithCategory($search1, $category );
        }
        return view('pages.search', ['results'=> $results, 'search' => [$search]]);
    }
}
