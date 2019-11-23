<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\posted_job;
use App\applied_job;
use DB;
use View;

class applied_job_controller extends Controller
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
        $posted_job = DB::table('users')
        ->where('users.user_type', '=', 1)
        ->join('posted_job', 'users.id', '=', 'posted_job.user_id')
        ->select('users.business_name', 'posted_job.*')
        ->orderBy('created_at', 'desc')
        ->paginate(10);


         return view('applied_job.index')->with('posted_job', $posted_job);
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
        //check resume
        $check_resume = DB::table('users')
                        ->whereNull('resume')
                        ->where('id', '=', auth()->user()->id)
                        ->get();
 

        if(count($check_resume)!=0){
            return redirect('/user_basic')
                    ->with('error', 'You have to upload resume before apply');
        } 
        else {
            $applied_job = new applied_job;
            $applied_job->user_id = auth()->user()->id;
            $applied_job->job_id = $id;
            $applied_job->save();

            return redirect('/applied_job')
                    ->with('success', 'You have successfully applied this job');
        }

        
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
        //
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
