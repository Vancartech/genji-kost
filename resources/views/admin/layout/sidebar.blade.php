<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-text mx-3">Genji <br> Kost</div>
  </a>
  
  <!-- Divider -->
  <hr class="sidebar-divider my-0">
  
  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin/home') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>
  
  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin/kamar') }}">
    <i class='fas fa-door-open'></i>
      <span>Kamar</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin/penyewa') }}">
    <i class='fas fa-user-alt'></i>
      <span>Penyewa</span></a>
  </li>
  
  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin/pembayaran') }}">
    <i class='fas fa-money-check'></i>
      <span>Laporan Keuangan</span></a>
  </li>
  
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
  
  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
  
  
</ul>
