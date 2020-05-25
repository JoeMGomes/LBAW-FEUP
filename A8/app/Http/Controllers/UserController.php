<?php

namespace App\Http\Controllers;

use DB;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        $inputs = $request->only('emailName', 'namePassword');

        $credentials['email'] = $inputs['emailName']; 
        $credentials['password'] = $inputs['namePassword']; 

        if(Auth::attempt($credentials)){
            DB::update(
                'UPDATE member SET name = :name where id = :id',
                [
                    'name' => $request->input('newUsername'),
                    'id' => Auth::user()->id
                ]
            );

            return back()->with('successMessage', 'Username changed successfuly!');
        } else{
            return back()->with('errorMessage','Your current password does not match');        
        }

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

        $inputs = $request->only('emailPass', 'oldPassword');
        
        $credentials['email'] = $inputs['emailPass']; 
        $credentials['password'] = $inputs['oldPassword']; 

        if(Auth::attempt($credentials)){
            DB::update(
                'UPDATE member SET password = :pass where id = :id',
                [
                    'pass' => bcrypt($request->input('inputPasswordNew')),
                    'id' => Auth::user()->id
                ]
            );

            return back()->with('successMessage', 'Password changed successfuly!');
        } else{
            return back()->with('errorMessage','Your current password does not match');        
        }
    }

        /**
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updateEmail(Request $request, User $user)
    {
        $this->authorize('update', User::class);

        $inputs = $request->only('emailEmail', 'passwordEmail');
        
        $credentials['email'] = $inputs['emailEmail']; 
        $credentials['password'] = $inputs['passwordEmail']; 


        if(Auth::attempt($credentials)){
            DB::update(
                'UPDATE member SET email = :email where id = :id',
                [
                    'email' =>$request->input('inputEmail'),
                    'id' => Auth::user()->id
                ]
            );

            return back()->with('successMessage', 'Email changed successfully!');
        } else{
            return back()->with('errorMessage','Your password does not match');        
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
