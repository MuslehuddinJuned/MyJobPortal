<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\user_basic;
use DB;
use View;

class user_controller extends Controller
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
        return view('user_basic.index')->with('users', $users);
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
        if(auth()->user()->id != $id){
            return redirect('/user_profile.index')->with('error','Unauthorized Page');
        }

        $user_basic_info = DB::table('users')->where('id', '=', auth()->user()->id)->get();      
        return view('user_basic.edit')->with('user_basic', $user_basic_info);
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
        $this->validate($request, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'business_name' => ['max:255'],
            'profile_image' => 'image|nullable|max:256',
            'resume' => 'file|nullable|max:256'
        ]);


        

        // Handle File Upload
        if($request->hasFile('profile_pic')){
            //Get file name with extension
            $fileNameWithExt = $request->file('profile_pic')->getClientOriginalName();
            // Get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // get just ext
            $extension = $request->file('profile_pic')->getClientOriginalExtension();
            // File name to store
            $imageNameToStore = '_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('profile_pic')->storeAs('public/profile_pic', $imageNameToStore);
        }

        if($request->hasFile('resume')){
            //Get file name with extension
            $fileNameWithExt = $request->file('resume')->getClientOriginalName();
            // Get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // get just ext
            $extension = $request->file('resume')->getClientOriginalExtension();
            // File name to store
            $fileNameToStore = '_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('resume')->storeAs('public/resume', $fileNameToStore);
        }

        $User = user_basic::find($id);
        $User->first_name = $request->input('first_name');
        $User->last_name = $request->input('last_name');
        $User->business_name = $request->input('business_name');
        $User->skill = $request->input('skill');
        if($request->hasFile('profile_pic')){
            $User->profile_pic = $imageNameToStore;
        }
        if($request->hasFile('resume')){
            $User->resume = $fileNameToStore;
        }
        $User->save();

        return redirect('/user_basic')->with('success', 'Profile Updated');
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
