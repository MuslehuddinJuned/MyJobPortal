@extends('layouts.app')

@section('content')
    <div class="card p-3 mb-3">
        <h2>Post A Job</h2>
    </div>
    <div class="card p-3">
            {!! Form::open(['action' => 'posted_job_controller@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group row px-5">
                {{Form::label('job_title', 'Job Title', ['class' => 'col-md-3 col-form-label text-right'])}}          
                {{Form::text('job_title', '', ['class' => 'form-control col-md-9', 'placeholder'=>'Job Title'])}}
            </div>  
            <div class="form-group row px-5">
                {{Form::label('job_description', 'Job Description', ['class' => 'col-md-3 col-form-label text-right'])}}  
                <div class="col-md-9 p-0">
                    {{Form::textarea('job_description', '', ['class' => 'form-control col-md-12 job_description'])}}
                </div> 
            </div> 
            <div class="form-group row px-5">
                {{Form::label('salary', 'Salary', ['class' => 'col-md-3 col-form-label text-right'])}}          
                {{Form::text('salary', '', ['class' => 'form-control col-md-9', 'placeholder'=>'Salary'])}}
            </div> 
            <div class="form-group row px-5">
                {{Form::label('location', 'Location', ['class' => 'col-md-3 col-form-label text-right'])}}          
                {{Form::text('location', '', ['class' => 'form-control col-md-9', 'placeholder'=>'Job Location'])}}
            </div> 
            <div class="form-group row px-5">
                {{Form::label('country', 'Country', ['class' => 'col-md-3 col-form-label text-right'])}}          
                {{Form::text('country', '', ['class' => 'form-control col-md-9', 'placeholder'=>'Country'])}}
            </div> 
            
            <div class="form-group px-5">
                    {{Form::submit('Submit', ['class'=>'btn btn-primary float-right px-5'])}}                
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