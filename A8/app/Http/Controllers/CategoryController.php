<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
    public function getCategories(Request $request){
        $ob = new Category();
        $response = $ob->allCategories($request->input('message'));
        return response()->json($response);
    }
}
