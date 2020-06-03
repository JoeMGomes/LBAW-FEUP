<?php

namespace App\Http\Controllers;

use Auth;
use App\Category;
use Illuminate\Http\Request;

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

    public function modifyCategory(Request $request){
        if(Auth::guard('admin')->check()){
            $obj = new Category();

            if(isset($request['editButton'])){
                
                $data['name'] = $request->input('inputCatEdit');
                $data['color'] = hexdec($request->input('color-pickerEdit'));
                $data['id'] = $request->input('catId');

                
                $obj->updateCateg($data);
                return redirect('/admin/categoryManagement')->with('successMessage', 'Category '.$request->input('categoryEdit').' was updated to '.$request->input('inputCatEdit').'!');

            }else if(isset($request['deleteButton'])){  
                $obj = new Category();

                $obj->deleteCateg(['name'=> $request->input('categoryEdit')]);
                return redirect('/admin/categoryManagement')->with('successMessage', 'Category '.$request->input('categoryEdit').' was deleted!');
            }
        }
        else{
            return view('pages.home')->with('errorMessage', ' Illegal Access');
        }
    }
}
