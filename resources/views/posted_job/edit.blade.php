@extends('layouts.app')

@section('content')
    <div class="card p-3 mb-3">
        <h2>Update Job Post</h2>
    </div>
    <div class="card p-3">
            {!! Form::open(['action' => ['posted_job_controller@update', $posted_job->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group row px-5">
                {{Form::label('job_title', 'Job Title', ['class' => 'col-md-3 col-form-label text-right'])}}          
                {{Form::text('job_title', $posted_job->job_title, ['class' => 'form-control col-md-9', 'placeholder'=>'Job Title'])}}
            </div>  
            <div class="form-group row px-5">
                {{Form::label('job_description', 'Job Description', ['class' => 'col-md-3 col-form-label text-right'])}}  
                <div class="col-md-9 p-0">
                    {{Form::textarea('job_description', $posted_job->job_description, ['class' => 'form-control col-md-12 job_description'])}}
                </div> 
            </div> 
            <div class="form-group row px-5">
                {{Form::label('salary', 'Salary', ['class' => 'col-md-3 col-form-label text-right'])}}          
                {{Form::text('salary', $posted_job->salary, ['class' => 'form-control col-md-9', 'placeholder'=>'Salary'])}}
            </div> 
            <div class="form-group row px-5">
                {{Form::label('location', 'Location', ['class' => 'col-md-3 col-form-label text-right'])}}          
                {{Form::text('location', $posted_job->location, ['class' => 'form-control col-md-9', 'placeholder'=>'Job Location'])}}
            </div> 
            <div class="form-group row px-5">
                {{Form::label('country', 'Country', ['class' => 'col-md-3 col-form-label text-right'])}}          
                {{Form::text('country', $posted_job->country, ['class' => 'form-control col-md-9', 'placeholder'=>'Country'])}}
            </div> 
            
            <div class="form-group px-5">
                {{Form::hidden('_method', 'PUT')}}
                {{Form::submit('Update', ['class'=>'btn btn-primary float-right px-5'])}}                
            </div>
            
            {!! Form::close() !!} 
             
    </div>

@endsection

@section('pagescript')
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector:'textarea.job_description',
    });
</script>
@stop