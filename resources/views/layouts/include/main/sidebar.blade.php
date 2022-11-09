<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="lines">
  <li class="navigation-header">
    <span>Main Menu</span>
  </li>
  <li class="nav-item">
    <a href="{{ route('dashboard.index') }}">
      <i class="menu-icon bx bxs-home"></i>
      <span class="menu-title">Dashboard</span>
    </a>
  </li>
  <li class="nav-item">
    <a href="{{ route('health-facilities.index') }}">
      <i class="menu-icon bx bx-book-bookmark"></i>
      <span class="menu-title">Health Facilities</span>
    </a>
  </li>
  <li class="nav-item">
    <a href="{{ route('report.index') }}">
      <i class="menu-icon bx bx-book-bookmark"></i>
      <span class="menu-title">Reports</span>
    </a>
  </li>
  <li class="nav-item">
    <a href="{{ route('user.index') }}">
    <i class="menu-icon bx bxs-user"></i>
      <span class="menu-title">Users</span>
    </a>
  </li>
  <li class="navigation-header">
    <span>Master Data</span>
  </li>
  <li class="nav-item">
    <a href="{{ route('provinces.index') }}">
      <i class="menu-icon bx bx-book-bookmark"></i>
      <span class="menu-title">Provinces</span>
    </a>
  </li>
  <li class="nav-item">
    <a href="{{ route('cities.index') }}">
      <i class="menu-icon bx bx-book-bookmark"></i>
      <span class="menu-title">Cities</span>
    </a>
  </li>
  <li class="nav-item">
    <a href="{{ route('vaccination.index') }}">
    <i class="menu-icon bx bx-book-bookmark"></i>
      <span class="menu-title">Vaccinations</span>
    </a>
  </li>
</ul>
