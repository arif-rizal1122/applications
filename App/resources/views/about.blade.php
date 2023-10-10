 {{-- halaman ini menguunakan halaman main.blade.php --}}
 @extends('layouts.main')


 {{-- apa pun yg ada di section ini yang akan mengantikan isi yg ada di @yield() nya --}}
 @section('container')

 <h1>Halaman About</h1>
 <h3> {{ $name }} </h3>
 <p> {{ $email  }}  </p>
 <img src="img/{{ $image }}" alt="{{ $name }}" width="200" class="img-thumbnail rounded-circle">

 @endsection
