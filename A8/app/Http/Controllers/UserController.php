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

        return redirect()->route('settings');
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
        return redirect()->route('home');
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

            ->with('success', 'You have successfully upload image.')

            ->with('image', $imageName);
    }
}
