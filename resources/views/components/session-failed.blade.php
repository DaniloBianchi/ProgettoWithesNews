 @if(session()->has('failed'))
    <div class="alert alert-danger">
    {{ session('failed') }}
    </div>
@endif