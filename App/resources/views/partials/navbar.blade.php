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
                <a class="nav-link {{ ($active === "home") ? 'active' : '' }}" href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link  {{ ($active === "About") ? 'active' : '' }}" href="/about">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link  {{ ($active === "Posts") ? 'active' : '' }}" href="/posts">Blog</a>
              </li>

              <li class="nav-item">
                <a class="nav-link  {{ ($active === "Categories") ? 'active' : '' }}" href="/categories">Categories</a>
              </li>
             
            </ul>
          </div>
        </div>
      </nav>