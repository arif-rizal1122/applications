@extends('layouts.main')

@section('container')

<div class="row justify-content-center">
<div class="col-lg-5">

 <main class="form-registration">

    <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>

    <form action="/register" method="post">
        {{-- ini csrf adalah fitur keamanan --}}
        @csrf
  
        {{-- name --}}
        {{-- is-invalid = yg menangani error --}}
        {{-- value="{{ old('username') }}" = mengambil inputan lama --}}
      <div class="form-floating">
        <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('name') }}" autofocus>
        <label for="name">Name</label>
        {{-- error --}}
        @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div> 
        @enderror   
      </div>

      {{-- username --}}
      <div class="form-floating">
        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="username" required value="{{ old('username') }}">
        <label for="username">Username</label> 
        @error('username')
        <div class="invalid-feedback">
            {{ $message }}
        </div> 
        @enderror         
      </div>
       
      {{-- email --}}
      <div class="form-floating">
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="email" required value="{{ old('email') }}">
        <label for="email">Email address</label>
        @error('email')
        <div class="invalid-feedback">
            {{ $message }}
        </div> 
        @enderror 
      </div>

      {{-- password --}}
      <div class="form-floating">
        <input type="password" name="password" class="form-control  rounded-bottom  @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
        <label for="password">Password</label>
        @error('password')
        <div class="invalid-feedback">
            {{ $message }}
        </div> 
        @enderror 
      </div>
  
      <button class="btn btn-lg btn-primary w-100 py-2" type="submit"> Register </button>
    </form>

    {{--  --}}
    <small class="d-block text-center mt-3">Already Registed? <a href="/login"> Login Now!</a> </small>

  </main>
 </div>
</div>

    
@endsection