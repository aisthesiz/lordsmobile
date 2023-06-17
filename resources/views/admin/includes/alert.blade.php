@if(session('error'))
    <div class="alert alert-danger alert-dismissible">
        {{ __(session('error')) }}
    </div>
@endif

@if ($errors->has('error'))
    <div class="alert alert-danger alert-dismissible">
        {{ $errors->first('error') }}
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success alert-dismissible">
        {{ __(session('success')) }}
    </div>
@endif
