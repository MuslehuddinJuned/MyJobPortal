<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Storage;
use App\user_profile;
use App\User;
use DB;
use View;

class user_profile_controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except'=>[]]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')->where('id', '=', auth()->user()->id)->get();
        return view('user_profile.index')->with('users', $users);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Check for correct user
        if(auth()->user()->id != $id){
            return redirect('/user_profile.index')->with('error','Unauthorized Page');
        }

         $User = DB::table('users')->where('id', '=', auth()->user()->id)->get(); 
     
        return view('user_profile.edit')->with('user_profile', $User);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $User = DB::table('users')->where('id', '=', auth()->user()->id)->get();
        $User->first_name = $request->input('first_name');
        $User->last_name = $request->input('last_name');
        $User->business_name = $request->input('business_name');
        $User->save();

        return redirect('/user_profile')->with('success', 'Profile Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}