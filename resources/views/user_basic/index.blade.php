@extends('layouts.app')

@section('content')
    <div class="card p-3 mb-3">
        <h2>Profile Details</h2>
    </div>
    <div class="card p-3">
        @foreach ($users as $user)
            @if ($user->user_type==0)
                <h4 class="text-danger"><img src="/storage/profile_pic/{{$user->profile_pic}}" alt="Please Insert Profile Picture" class="col-md-2"></h4>
               

               
                
            @endif
                <h4> First Name: {{$user->first_name}}</h4>
                <h4> Last Name: {{$user->last_name}}</h4>
            @if ($user->user_type==1)
                <h4> Business Name: {{$user->business_name}}</h4>
            @endif
                <h4> Email: {{$user->email}}</h4>
            @if ($user->user_type==0)
                <h4> Skills</h4>
                <div class="card p-2 bg-light mb-2"><p> {!!$user->skill!!}</p></div>
                <h4> Resume: 
                    @if ($user->resume)
                        <a href="/storage/resume/{{$user->resume}}">Download Resume</a></h4>
                    @else
                        <a href="/user_basic/{{$user->id}}/edit" class="text-danger" >Upload Resume</a></h4>
                    @endif 
            @endif
                        
        @endforeach
        <a href="/user_basic/{{$user->id}}/edit" class="btn btn-primary float-left px-5 mt-2 col-md-3">Edit</a>
    </div>

@endsection