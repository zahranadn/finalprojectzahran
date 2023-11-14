<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard')}}">
        <div class="sidebar-brand-text mx-3">
            Tiket Online Gunung Admin
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{{route('destinasi-detail.index')}}">
            <i class="fas fa-fw fa-mountain"></i>
            <span>Destinasi Gunung</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('jadwal-pendakian.index')}}">
            <i class="fas fa-fw fa-mountain"></i>
            <span>Pilihan Jadwal Pendakian</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('gallery.index')}}">
            <i class="fas fa-fw fa-image"></i>
            <span>Gallery Gunung</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('transaction.index')}}">
            <i class="fas fa-fw fa-dollar-sign"></i>
            <span>Transaksi</span></a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->