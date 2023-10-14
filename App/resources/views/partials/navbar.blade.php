    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="container">
          <a class="navbar-brand" href="/"> Arif Rizal | Blog </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                {{-- jika title nya home maka tambahkan halaman aktiv --}}
                {{-- kalau kita dihalaman home maka tambahkan halaman aktiv di navbar --}}
                <a class="nav-link {{ Request::is('home') ? 'active' : '' }}" href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link  {{ Request::is('about') ? 'active' : '' }}" href="/about">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link  {{ Request::is('posts') ? 'active' : '' }}" href="/posts">Blog</a>
              </li>

              <li class="nav-item">
                <a class="nav-link  {{ Request::is('catagories') ? 'active' : '' }}" href="/categories">Categories</a>
              </li>
            </ul>



            
            {{-- ini mengecek user apakah sudah login apa bleum kalau sudah apa yg akan ditampilkan kalau belum apa yg akan ditampilkan--}}
            <ul class="navbar-nav ms-auto">
            @auth
              {{-- navbar(dropdown) --}}
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{-- {{ auth()->user()->name }} = mngbil nama user yg sudah login --}}
                Welcome back, {{ auth()->user()->name }}
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropDown">
                <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard</a></li>
                <li><hr class="dropdown-divider"></li>

                <li>
                <form action="/logout" method="post">
                  {{-- setiap form butuh @csrf --}}
                       @csrf
                  <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                </form>
                </li>
                
              </ul>
            </li>

            @else 
            {{-- ini untuk login --}}
              <li class="nav-item">
                <a class="nav-link  {{ ($active === "Login") ? 'active' : '' }}" href="/login"><i class="bi bi-box-arrow-in-right"></i>Login</a>
              </li>
            @endauth
            </ul>

          </div>
        </div>
      </nav>
