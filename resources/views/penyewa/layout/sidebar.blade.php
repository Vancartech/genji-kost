<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-text mx-3">Genji <br> Kost</div>
  </a>
  
  <!-- Divider -->
  <hr class="sidebar-divider my-0">
  
  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('penyewa/dashboard') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwoTransaksi"
    aria-expanded="true" aria-controls="collapseTwo" >
    <i class='far fa-credit-card'></i>
      <span>Pembayaran</span></a>
      <div id="collapseTwoTransaksi" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('penyewa/pembayaran') }}">Tagihan</a>
                        <a class="collapse-item" href="{{ route('penyewa/pembayaran/bayar') }}">History Pembayaran</a>
                    </div>
                </div>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('home') }}">
    <i class='fas fa-newsaper'></i>
      <span>Beranda</span></a>
  </li>
  
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
  
  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
  
  
</ul>
