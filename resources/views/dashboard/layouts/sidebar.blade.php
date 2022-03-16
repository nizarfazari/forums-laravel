<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard">
          <span data-feather="home"></span>
          Dashboard
        </a>
      </li>
      {{-- wildcard menggunakan * --}}
      <li class="nav-item {{ Request::is('dashboard/posts*') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard/posts">
          <span data-feather="shopping-cart"></span>
          My Post
        </a>
      </li>
    </ul>

    @can('admin')
    <h6 class="sidebar-heading d-flex justify-content-between align-items-center mt-3 px-3 mb-1">
      <span>Administrator</span>
    </h6>
    <ul class="nav flex-column">
      <li class="nav-item ">
        <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
          <span data-feather="grid"></span>
          Post Category
        </a>
      </li>
    </ul>
    @endcan
  </div>

</nav>