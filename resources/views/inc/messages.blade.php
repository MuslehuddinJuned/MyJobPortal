@if(count($errors)>0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger py-3">
            {{$error}}
        </div>
    @endforeach
@endif

@if(session('success'))
        <div class="alert alert-success py-3">
            {{session('success')}}
        </div>
@endif

@if(session('error'))
        <div class="alert alert-danger py-3">
            {{session('error')}}
        </div>
@endif