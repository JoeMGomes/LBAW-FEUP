<?php

namespace App\Http\Controllers;

use App\Bookmark;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function show(){
        $obj =new Bookmark();
        $allBookmarks = $obj->getBookmarks();
        
        return view('pages.bookmark', ['results' => $allBookmarks]);
    }


    public function addBookmark(Request $request){
        $obj =new Bookmark();
        $obj->addBook($request->input('message'));
    }


    public function removeBookmark(Request $request){
        $obj =new Bookmark();
        $obj->removeBook($request->input('message'));
    }
}
