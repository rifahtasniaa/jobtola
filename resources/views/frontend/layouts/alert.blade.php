@if(Session::has('success'))
    <div class="alert alert-success z-99">
        {{ Session::pull('success') }}
    </div>
@endif
@if(Session::has('danger'))
    <div class="alert alert-danger z-99">
        {{ Session::pull('danger') }}
    </div>
@endif
