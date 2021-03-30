<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">IFS COVID</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column  nav-flat nav-compact" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link @yield('dashboard')">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Halaman
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/virus') }}" class="nav-link  @yield('virus')">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Data Virus
                        </p>
                    </a>
                </li>
                <li class="nav-header">DAERAH</li>
                <li class="nav-item">
                    <a href="{{ url('/provinsi') }}" class="nav-link  @yield('provinsi')">
                        <i class="fas fa-circle nav-icon"></i>
                        <p> Data Provinsi</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/kota') }}" class="nav-link @yield('kota')">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Data Kota</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/kecamatan') }}" class="nav-link @yield('kecamatan')">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Data Kecamatan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/kelurahan') }}" class="nav-link @yield('kelurahan')">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Data Kelurahan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/rw') }}" class="nav-link @yield('rw')">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Data Rw</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
