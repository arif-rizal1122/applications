@extends('layouts.main')

@section('container')

<div class="row justify-content-center">
    <div class="col-md-4">

      {{-- flash --}}
      @if (session()->has('success'))
          
      <div class="alert alert-success alert-dismissible fade show" role="alert">

        {{ session('success') }}

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif


            {{-- flash = kalau misalnya di session ada loginErrors --}}
            @if (session()->has('LoginErrors'))
          
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
      
              {{ session('LoginErrors') }}
      
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

        
<main class="form-signin">

    <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>

    <form action="/login" method="post">
      {{-- security --}}
      @csrf

      <img class="mb-4" src="/img/coba.jpg" alt="" width="72" height="57">
  
      {{-- email --}}
      <div class="form-floating">
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
        <label for="email">Email address</label>
      {{-- value="{{ old('email') }}" = ini mempertahankan nilai lama --}}
      @error('email')
      <div class="invalid-feedback">
        {{ $message }}
      </div>         
      @enderror
      </div>

      {{-- password --}}
      <div class="form-floating">
        <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
        <label for="password">Password</label>

        @error('password')
        <div class="invalid-feedback">
          {{ $message }}
        </div>         
        @enderror
      </div>
  
      <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
      <p class="mt-5 mb-3 text-body-secondary text-center">&copy; 2017–2023</p>
    </form>

    {{--  --}}
    <small class="d-block text-center mt-3">Not Register <a href="/register">Register Now!</a></small>

  </main>
 </div>
</div>

    
@endsection