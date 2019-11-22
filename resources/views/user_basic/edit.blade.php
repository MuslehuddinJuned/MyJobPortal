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

            @if ($user->user_type == 1)                
                <div class="form-group row px-5">
                    {{Form::label('business_name', 'Business Name', ['class' => 'col-md-3 col-form-label text-right'])}}                
                    {{Form::text('business_name', $user->business_name, ['class' => 'form-control col-md-9'])}}
                </div>
            @endif

            @if ($user->user_type == 0)  
                <div class="form-group row px-5">
                    {{Form::label('skill', 'Add Skill', ['class' => 'col-md-3 col-form-label text-right'])}}  
                    <div class="col-md-9 p-0">
                        {{Form::textarea('skill', $user->skill, ['class' => 'form-control col-md-12 skill'])}}
                    </div>              
                    
                </div> 
                <div class="form-group row px-5">
                    {{Form::label('resume', 'Insert Resume', ['class' => 'col-md-3 col-form-label text-right'])}}                
                    {{Form::file('resume', $attributes =['class' => 'form-control col-md-6', 'aria-describedby'=>"resumedHelpBlock"])}}
                    <small id="resumedHelpBlock" class="form-text text-muted col-md-3">max file size 256 kb</small>
                </div> 
                <div class="form-group row px-5">
                    {{Form::label('profile_pic', 'Insert Image', ['class' => 'col-md-3 col-form-label text-right'])}}                
                    {{Form::file('profile_pic', ['class' => 'form-control col-md-6',  'aria-describedby'=>"imagedHelpBlock"])}}
                    <small id="imagedHelpBlock" class="form-text text-muted col-md-3">max file size 256 kb</small>
                </div>
            @endif
            
            <div class="form-group px-5">
                {{Form::hidden('_method', 'PUT')}}
                {{Form::submit('Update', ['class'=>'btn btn-primary float-right px-5'])}}

                
            </div>
            
            {!! Form::close() !!} 
        @endforeach
             
    </div>

@endsection

@section('pagescript')
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector:'textarea.skill',
    });
</script>
@stop