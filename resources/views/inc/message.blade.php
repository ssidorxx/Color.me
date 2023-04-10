@if(\Illuminate\Support\Facades\Session::has('success'))
<div class="alert alert-success m-lg-2 rounded-0">
    <p>{{ session('success') }}</p>
</div>
@endif
@error('error')
<div class="alert alert-danger m-lg-2 rounded-0">
    <p>{{ $message }}</p>
</div>
@enderror
