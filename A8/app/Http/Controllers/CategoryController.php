<?php

namespace App\Http\Controllers;

use Auth;
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

    public function createCategory(Request $request){
        if(Auth::guard('admin')->check()){
            $newCat = new Category();

            $input['name'] = $request->input('inputCat');
            $input['color'] = hexdec($request->input('color-picker'));

            
            $newCat->create($input);

            return redirect('/admin/categoryManagement')->with('successMessage', 'Category '.$input['name'].' was added!');
        }
        else{
            return view('pages.home')->with('errorMessage', ' Illegal Access');
        }
    }
}
