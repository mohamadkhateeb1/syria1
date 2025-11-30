@if(session('flash_message'))
    <div class="alert alert-success">
        {{ session('flash_message') }}
    </div>
@endif

@if(session('warning'))
    <div class="alert alert-info">
        {{ session('warning') }}
    </div>
@endif

@if(session('danger'))
    <div class="alert alert-danger">
        {{ session('danger') }}
    </div>
@endif