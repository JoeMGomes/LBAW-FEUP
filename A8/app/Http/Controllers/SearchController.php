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
        $results = $obj->search($search);
        return view('pages.search', ['results'=> $results, 'search' => [$search]]);
    }

}
