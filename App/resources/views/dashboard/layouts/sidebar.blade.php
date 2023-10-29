


<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">

      <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
        <ul class="nav flex-column">

            <li class="nav-item color-text-black">
            <a class="nav-link" 
            aria-current="page" href="/dashboard">
              <svg class="bi"><use xlink:href="#house-fill"/></svg>
              Dashboard
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link"   href="/dashboard/posts">
              <svg class="bi"><use xlink:href="#file-earmark"/></svg>
              My Posts
            </a>
          </li>
        </ul>

        {{-- Gates untuk otorisasi laravel yg dimana kita bisa menampilkan atau pun tisdak. halaman / link tergantung pada kebutuhan--}}

        @can('isAdmin')
            
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Administrator</span>
        </h6>


        <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" href="/dashboard/categories">
              <span><i class="bi bi-hourglass"></i></span>
              Post Category
            </a>
            </li>
        </ul>

        @endcan
        
      </div>
    </div>
</nav>