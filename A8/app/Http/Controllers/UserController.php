<?php

namespace App\Http\Controllers;

use DB;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Display the settings page
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function showSettings(User $user)
    {
        if (Auth::check()) {
            return view('pages.settings');
        } else {
            return redirect('login');
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updateName(Request $request, User $user)
    {
        $this->authorize('update', User::class);


        DB::update(
            'UPDATE member SET name = :name where id = :id',
            [
                'name' => $request->input('newUsername'),
                'id' => Auth::user()->id
            ]
        );

        return back()->with('successMessage', 'Username changed successfuly!');
    }
    /**
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request, User $user)
    {
        $this->authorize('update', User::class);
        $currPass = DB::select('SELECT password from member where id = :id', ['id' => Auth::user()->id]);

        $js_code = 'console.log(' . json_encode(bcrypt($request->input('inputPasswordOld')), JSON_HEX_TAG) . ');';
        echo $js_code;

        if(bcrypt($request->input('inputPasswordOld')) == $currPass){
            DB::update(
                'UPDATE member SET password = :password where id = :id',
                [
                    'password' => bcrypt($request->input('inputPasswordTwo')),
                    'id' => Auth::user()->id
                ]
            );

            // return back()->with('successMessage', 'Password changed successfully!');
        } else{
            // return back()->with('errorMessage','Your current password does not match');        
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', User::class);

        $user = Auth::user()->id;

        Auth::logout();


        DB::delete('DELETE FROM member WHERE id = ?', [$user]);
        return redirect()->route('home')->with('successMessage','You have deleted your account :\'( Come back any time!');
    }


    public function uploadImage()
    {
        request()->validate([

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $imageName = Auth::user()->id . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('img'), $imageName);

        DB::select('UPDATE member set photo_url = ? WHERE id = ?', [$imageName, Auth::user()->id]);
        
        return back()

            ->with('successMessage', 'You have successfully upload your image!')

            ->with('image', $imageName);
    }
}
