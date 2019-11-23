@extends('layouts.app')

@section('content')
    <div class="card p-3 mb-3">
    <h2>All Applied Job</h2>
    </div>
    @if(count($posted_job) > 0)
        @foreach ($posted_job as $job)
            <div class="card p-3 my-3">
                <h4>{{$job->job_title}}</h4>
                <h5>{{$job->business_name}}</h5>
                <div class="row">
                <div class="col-10 text-truncate">{!!$job->job_description!!}</div>
                </div>
                Salary: {{$job->salary}} || Location:{{$job->location}} || Country:{{$job->country}}
                <hr>
                <div class="row">
                    <div class="col-6"><a href="/posted_job/{{$job->id}}" class="btn btn-primary float-left mr-3 px-5">View Details</a></div>
                    
                </div>
                
            </div>
                        
        @endforeach
        {{ $posted_job->links()}}
    @else
        <div class="card p-3 my-3">
            <P>You did not applied to any job</P>
        </div>
    @endif

@endsection