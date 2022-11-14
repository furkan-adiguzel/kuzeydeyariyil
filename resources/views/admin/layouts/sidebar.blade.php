<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.home') }}" class="brand-link">
        <img src="{{ asset("admin/img/AdminLTELogo.png") }}" alt="Assamble Agora 2022"
             class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Assamble Agora 2022</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset("admin/img/user2-160x160.jpg") }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item ">
                    <a href="{{ route('admin.home') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Admin Panel
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.attender.index') }}" class="nav-link {{ (request()->is('admin/attender*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-hospital-user"></i>
                        <p>
                            Katılımcılar
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.user.index') }}" class="nav-link {{ (request()->is('admin/user*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Üyeler
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.room.index') }}" class="nav-link {{ (request()->is('admin/room*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-hotel"></i>
                        <p>
                            Odalar
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.package.index') }}" class="nav-link {{ (request()->is('admin/package*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Paketler
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.message') }}" class="nav-link {{ (request()->is('admin/message*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Mesaj Gönder
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
