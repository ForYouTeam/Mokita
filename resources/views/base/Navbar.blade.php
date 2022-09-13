<div class="container-fluid">
    <a class="navbar-brand mx-lg-1 mr-0" href="./index.html">
      <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
        <g>
          <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
          <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
          <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
        </g>
      </svg>
    </a>
    <button class="navbar-toggler mt-2 mr-auto toggle-sidebar text-muted">
      <i class="fe fe-menu navbar-toggler-icon"></i>
    </button>
    <div class="navbar-slide bg-white ml-lg-4" id="navbarSupportedContent">
      <a href="#" class="btn toggle-sidebar d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
        <i class="fe fe-x"><span class="sr-only"></span></i>
      </a>
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="#">
                <span class="ml-lg-2">Dashboard</span>
            </a>
        </li>
        {{-- <li class="nav-item dropdown">
          <a href="#" id="dashboardDropdown" class="dropdown-toggle nav-link" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="ml-lg-2">Dashboard</span><span class="sr-only">(current)</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="dashboardDropdown">
            <a class="nav-link pl-lg-2" href="./index.html"><span class="ml-1">Default</span></a>
            <a class="nav-link pl-lg-2" href="./dashboard-analytics.html"><span class="ml-1">Analytics</span></a>
            <a class="nav-link pl-lg-2" href="./dashboard-sales.html"><span class="ml-1">E-commerce</span></a>
            <a class="nav-link pl-lg-2" href="./dashboard-saas.html"><span class="ml-1">Saas Dashboard</span></a>
            <a class="nav-link pl-lg-2" href="./dashboard-system.html"><span class="ml-1">Systems</span></a>
          </div>
        </li> --}}
        <li class="nav-item">
          <a class="nav-link" href="widgets.html">
            <span class="ml-lg-2">Widgets</span>
            <span class="badge badge-pill badge-primary">New</span>
          </a>
        </li>
      </ul>
    </div>
    <form class="form-inline ml-md-auto d-none d-lg-flex searchform text-muted">
      <input class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted" type="search" placeholder="Type something..." aria-label="Search">
    </form>
    <ul class="navbar-nav d-flex flex-row">
      <li class="nav-item">
        <a class="nav-link text-muted my-2" href="./#" id="modeSwitcher" data-mode="light">
          <i class="fe fe-sun fe-16"></i>
        </a>
      </li>
    </ul>
  </div>