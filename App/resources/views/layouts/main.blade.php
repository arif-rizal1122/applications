{{-- starter template --}}
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> </title>

    {{-- Template bootstrap css --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    {{-- bootstrap icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">


    {{-- My CSS --}}
    <link rel="stylesheet" href="/css/style.css">
    
  </head>

  <body>

      {{-- disini akan tersimpan sebuah navbar dari folder partials nya --}}
      @include('partials.navbar')

      <div class="container">

        {{-- 1. layout utama ini yg berbeda adalah hanya h1(judul).
              2. ini kita kasih tau bahawa ini diambil dari file child view nya 
              3. @yield('container') ini nama session yg ada di halaman child nya --}}
        @yield('container')

      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
  </body>
</html>