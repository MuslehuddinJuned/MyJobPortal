@extends('layouts.app')

@section('content')
    
    @if(count($posted_job) > 0)
        @foreach ($posted_job as $job)
            <div class="card p-3 mb-3">
                <h3>{{$job->job_title}}</h3>
                <h5>{{$job->business_name}}</h5>
            </div>
            <div class="card p-3 my-3">
                <h5>Description of Job</h5>
                <div class="bg-light my-2 p-3">{!!$job->job_description!!}</div>
                <h5>Other Details</h5>
                Salary: {{$job->salary}} || Location:{{$job->location}} || Country:{{$job->country}}
                <hr>
                <div class="row">
                    <div class="col-6"><a href="/applied_job/{{$job->id}}/edit" class="btn btn-primary float-left mr-3 px-5">Apply Now</a></div>
                    
                </div>
                
            </div>
                        
        @endforeach
    @else
        <div class="card p-3 my-3">
            <P>You did not post any job</P>
        </div>
    @endif

@endsection