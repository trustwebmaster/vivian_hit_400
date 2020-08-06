<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <span class="brand-text font-weight-light">Classroom
        </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview">
                    <a href="/" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="/e-filling/public-sections" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Public
                        </p>
                    </a>
                </li>
      
                <li class="nav-item has-treeview">
                    <a href="/e-filling/department" class="nav-link">
                        <i class="nav-icon far fa-folder"></i>
                        <p>
                            Department
                        </p>
                    </a>
                </li>
      
                <li class="nav-item has-treeview">
                    <a href="/e-filling/personal" class="nav-link">
                        <i class="nav-icon far fa-user"></i>
                        <p>
                            Personal
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>