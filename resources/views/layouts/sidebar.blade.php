<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin/dashboard">
        <div class="sidebar-brand-text mx-3">
            <img src="https://is3.cloudhost.id/storage-feb/logo-sistem/logo-digilib-putih.png" class="img-fluid my-2  " width="100%" alt="">
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{Request::is('admin/dashboard*') ? 'active' : ''}}">
        <a class="nav-link" href="/admin/dashboard">
            <i class="fa fa-home"></i>
            <span>Dashboard</span></a>
    </li>

   
    <!-- Heading -->
    <div class="sidebar-heading">
        Koleksi
    </div>
    
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Nav Item - buku -->
    <li class="nav-item {{Request::is('admin/buku*') ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('buku.index') }}">
            <i class="fa fa-book"></i>
            <span>Buku</span></a>
    </li>
    <!-- Nav Item - skripsi -->
    <li class="nav-item {{Request::is('admin/skripsi*') ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('skripsi.index') }}">
            <i class="fa fa-newspaper"></i>
            <span>Skripsi</span></a>
    </li>

    {{-- <li class="nav-item {{ Route::is('admin.yudisium.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.yudisium.index') }}">
            <i class="fas fa-fw fa-paper-plane"></i>
            <span>Pendaftaran Yudisium</span></a>
    </li> --}}
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->