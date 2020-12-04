@if(session()->has('message')) 
    <div class="alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"></button>
        {{ session('message') }}
    </div>
@endif