
@extends('layouts.app')

@section('content')
    <div class="card p-3 mb-3">
    <h2>Applicant List</h2>
    </div>
    @if(count($applicant_list) > 0)
        @foreach ($applicant_list as $user)
            <div class="card p-3 my-3">
                <h4 class="text-danger"><img src="/storage/profile_pic/{{$user->profile_pic}}" alt="No Image" class="col-md-2"></h4>               
                <h4> First Name: {{$user->first_name}}</h4>
                <h4> Last Name: {{$user->last_name}}</h4>
                <h4> Email: {{$user->email}}</h4>
                <h4> Skills</h4>
                <div class="card p-2 bg-light mb-2"><p> {!!$user->skill!!}</p></div>
                <h4> Resume: <a href="/storage/resume/{{$user->resume}}">Download Resume</a></h4>                
            </div>                        
        @endforeach
        {{ $applicant_list->links()}}
    @else
        <div class="card p-3 my-3">
            <P>No one applied yet</P>
        </div>
    @endif

@endsection