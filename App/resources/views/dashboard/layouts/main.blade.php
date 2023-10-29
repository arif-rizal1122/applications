<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Arif-rizal">

    <title> Dashboard | Blog </title>
    
    {{-- bootstrap core Css --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">

        {{-- trix editor --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>
        
        <style>
          trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
          }

        document.addEventListener('trix-file-accept', function(e){
          e.preventDefault();
        })

        </style>



  </head>
  <body>
   
    
@include('dashboard.layouts.header')

<div class="container-fluid">
  <div class="row">


 
    @include('dashboard.layouts.sidebar')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        @yield('container')
        
    </main>
  

  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<script src="/js/dashboard.js"></script>


</body>

</html>
