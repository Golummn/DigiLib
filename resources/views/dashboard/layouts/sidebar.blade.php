<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
            <i class="fa fa-book"></i>
        </div>
        <div class="sidebar-brand-text mx-3">
            DigiLib
        </div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{Request::is('/') ? 'active' : ''}}">
        <a class="nav-link" href="/">
            <i class="fas fa-home"></i>
            <span>Dashboard</span></a>
    </li>
    <!-- Heading -->
    <div class="sidebar-heading">
        Informasi
    </div>
    
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Nav Item - rak -->
    <li class="nav-item {{Request::is('dashboard/rak*') ? 'active' : ''}}">
        <a class="nav-link" href="/dashboard/rak">
            <i class="fa fa-newspaper"></i>
            <span>Rak</span></a>
    </li>
    <!-- Nav Item - buku -->
    <li class="nav-item {{Request::is('buku*') ? 'active' : ''}}">
        <a class="nav-link" href="/buku">
            <i class="fa fa-newspaper"></i>
            <span>Buku</span></a>
    </li>
    <!-- Nav Item - skripsi -->
    <li class="nav-item {{Request::is('skripsi*') ? 'active' : ''}}">
        <a class="nav-link" href="/skripsi">
            <i class="fa fa-bullhorn"></i>
            <span>Skripsi</span></a>
    </li>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->