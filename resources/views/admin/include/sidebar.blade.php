<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('adminassets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{ auth()->user()->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item has-treeview   ">
                <a href="{{ route('admin.dashboard') }}"
                    class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        لوحة التحكم
                    </p>
                </a>
            </li>

            <li class="nav-item has-treeview   ">
                <a href="{{ route('admin.users.index') }}"
                    class="nav-link {{ request()->routeIs('admin.users.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        المستخدمين
                    </p>
                </a>
            </li>

            <li class="nav-item has-treeview   ">
                <a href="{{ route('admin.product.index') }}"
                    class="nav-link {{ request()->routeIs('admin.product.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        المنتجات
                    </p>
                </a>
            </li>
            <li class="nav-item has-treeview   ">
                <a href="{{ route('admin.categories.index') }}"
                    class="nav-link {{ request()->routeIs('admin.categories.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        فئات
                    </p>
                </a>
            </li>


            <li class="nav-item has-treeview   ">
                <a href="{{ route('admin.admin_panel_settings.index') }}"
                    class="nav-link {{ request()->routeIs('admin.admin_panel_settings.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        الاعدادات
                    </p>
                </a>
            </li>


        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
