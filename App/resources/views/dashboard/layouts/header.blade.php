


<header class="navbar sticky-top bg-dark flex-md-nowrap p-3 shadow" data-bs-theme="dark">
    <a class="navbar-brand col-md-3 col-lg-2 px-3 fs-0 text-white text-center" href="#"> {{ Auth::user()->name }} </a>
  
    {{-- searching --}}
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <input type="text" class="form-control form-control-dark w-100" placeholder="Search" aria-label="Search">
     <div class="navbar-nav">
       <div class="nav-item text-nowrap">
  
         <form action="/logout" method="post">
          {{-- setiap form butuh @csrf --}}
               @csrf
          <button type="submit" class="nav-link px-3 "><i class="bi bi-box-arrow-right"></i> Logout</button>
        </form>
       </div>
     </div>
  </header>