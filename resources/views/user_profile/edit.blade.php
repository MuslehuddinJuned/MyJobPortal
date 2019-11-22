@extends('layouts.app')

@section('content')
    <div class="card p-3 mb-3">
        <h2>Edit Profile Details</h2>
    </div>
    <div class="card p-3">
        @foreach ($user_basic as $user)
            {!! Form::open(['action' => ['user_controller@update', $user->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group row px-5">
                {{Form::label('first_name', 'First Name', ['class' => 'col-md-3 col-form-label text-right'])}}                
                {{Form::text('first_name', $user->first_name, ['class' => 'form-control col-md-9'])}}
            </div>
            <div class="form-group row px-5">
                {{Form::label('last_name', 'Last Name', ['class' => 'col-md-3 col-form-label text-right'])}}                
                {{Form::text('last_name', $user->last_name, ['class' => 'form-control col-md-9'])}}
            </div>
            <div class="form-group row px-5">
                {{Form::label('business_name', 'Business Name', ['class' => 'col-md-3 col-form-label text-right'])}}                
                {{Form::text('business_name', $user->business_name, ['class' => 'form-control col-md-9'])}}
            </div>
            <div class="form-group px-5">
                {{Form::hidden('_method', 'PUT')}}
                {{Form::submit('Submit', ['class'=>'btn btn-primary float-right px-5'])}}
            </div>
            
            {!! Form::close() !!} 
        @endforeach
             
    </div>

@endsection