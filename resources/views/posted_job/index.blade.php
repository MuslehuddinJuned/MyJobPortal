@extends('layouts.app')

@section('content')
    <div class="card p-3 mb-3">
    <h2>All Posted Job by {{auth()->user()->business_name}}</h2>
    </div>
    
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
                    <div class="col-6 text-right">Applied ()</div>
                </div>
                
            </div>
                        
        @endforeach
        {{ $posted_job->links()}}

@endsection