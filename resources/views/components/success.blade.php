@if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        <div class="alert-text">{{ Session::get('success') }}</div>
    </div>
@endif
