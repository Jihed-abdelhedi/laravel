@extends('master')
@section('content')
<h1 class="text-center mb-4 text-info ">Registration Form</h1>

<form class="offset-lg-3 col-lg-6 mg-auto bg-light pt-3 pb-3 border border-info rounded" method="POST" action="{{ route('subscribe') }}">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Nom</label>
        <input name="name" type="text" class="form-control" id="exampleInputEmail2"  placeholder="Enter Nom" value="">
        
      </div>

      @error('name')
      <div class="alert alert-danger">{{ $message }}</div>
     @enderror

    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="" >
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror

   
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>

    @error('password')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror

    <div class="form-group">
        <label for="password_confirmation">Confirm Password</label>
        <input name="password_confirmation" type="password" class="form-control" id="exampleInputPassword2" placeholder="Password confirmation">
      </div>

  
    
    <button type="submit" class="btn btn-primary">Register</button>
  </form>
@endsection