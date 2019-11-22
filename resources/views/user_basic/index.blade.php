@extends('layouts.app')

@section('content')
    <div class="card p-3 mb-3">
        <h2>Profile Details</h2>
    </div>
    <div class="card p-3">
        @foreach ($users as $user)
            @if ($user->user_type==1)
                <h4> First Name: {{$user->first_name}}</h4>
                <h4> Last Name: {{$user->last_name}}</h4>
                <h4> Business Name: {{$user->business_name}}</h4>
                <h4> Email: {{$user->email}}</h4>
            @endif            
        @endforeach
        <a href="/user_basic/{{$user->id}}/edit" class="btn btn-primary float-left px-5 mt-2 col-md-3">Edit</a>
    </div>

@endsection