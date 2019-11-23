<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\posted_job;
use DB;
use View;

class posted_job_controller extends Controller
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
        $posted_job = posted_job::orderBy('created_at','desc')->where('user_id', '=', auth()->user()->id)->paginate(10);
        return view('posted_job.index')->with('posted_job', $posted_job);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posted_job.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $posted_job = new posted_job;
        $posted_job->user_id = auth()->user()->id;
        $posted_job->job_title = $request->input('job_title');
        $posted_job->job_description = $request->input('job_description');
        $posted_job->salary = $request->input('salary');
        $posted_job->location = $request->input('location');
        $posted_job->country = $request->input('country');
        $posted_job->save();

        return redirect('/posted_job')->with('success', 'Job Posted Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posted_job = DB::table('users')
        ->join('posted_job', 'users.id', '=', 'posted_job.user_id')
        ->where('posted_job.id', '=', $id)
        ->select('users.business_name', 'posted_job.*')
        ->orderBy('created_at', 'desc')
        ->get();


         return view('posted_job.show')->with('posted_job', $posted_job);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posted_job = posted_job::find($id);

        // Check for correct user
        if(auth()->user()->id != $posted_job->user_id){
            return redirect('/')->with('error','Unauthorized Page');
        }
        return view('posted_job.edit')->with('posted_job', $posted_job);
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
        $posted_job = posted_job::find($id);
        $posted_job->user_id = auth()->user()->id;
        $posted_job->job_title = $request->input('job_title');
        $posted_job->job_description = $request->input('job_description');
        $posted_job->salary = $request->input('salary');
        $posted_job->location = $request->input('location');
        $posted_job->country = $request->input('country');
        $posted_job->save();

        return redirect('/posted_job')->with('success', 'Job Updated Succesfully');
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
