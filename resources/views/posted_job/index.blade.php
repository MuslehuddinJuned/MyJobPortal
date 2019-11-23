@extends('layouts.app')

@section('content')
    <div class="card p-3 mb-3">
    <h2>All Posted Job by {{auth()->user()->business_name}}</h2>
    </div>
    @if(count($posted_job) > 0)
        @foreach ($posted_job as $job)
            <div class="card p-3 my-3">
                <h4>{{$job->job_title}}</h4>
                <div class="row">
                <div class="col-10 text-truncate">{!!$job->job_description!!}</div>
                </div>
                Salary: {{$job->salary}} || Location:{{$job->location}} || Country:{{$job->country}}
                <hr>
                <div class="row">
                    <div class="col-6"><a href="/posted_job/{{$job->id}}/edit" class="btn btn-primary float-left mr-3 px-5">Edit</a></div>
                    

                    @php 
                    $count_applicant = DB::select('SELECT COUNT(job_id)job FROM `applied_job` WHERE job_id= :id',['id' => $job->id]);               
                    @endphp

                    @foreach ($count_applicant as $count)
                        <div class="col-6 text-right"><a href="/applied_job/applicant_list/{{$job->id}}">Applied ({{$count->job}})</a></div>
                    @endforeach
                    
                </div>
                
            </div>
                        
        @endforeach
        {{ $posted_job->links()}}
    @else
        <div class="card p-3 my-3">
            <P>You did not post any job</P>
        </div>
    @endif

@endsection