@if(isset($errors) && $errors->any())
@foreach ($errors->all() as $error)
<div class="alert alert-danger role="alert">
  <strong>Error!</strong> {{$error}}
</div>
@endforeach
@endif

@if(session()->has('message'))
<div class="alert alert-success role="alert">
  <strong>Success!</strong> {{session('message')}}
</div>
@elseif(session()->has('error'))
<div class="alert alert-danger role="alert">
  <strong>Error!</strong> {{session('error')}}
</div>

@endif