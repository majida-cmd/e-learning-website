<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <div class="input-group-append">
                </div>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Gestion
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('etudiants.index') }}"
                                class="nav-link {{ request()->routeIs('etudiants.index') ? 'active' : '' }}">
                                <i class="fas fa-user-graduate"></i>
                                <p>
                                    Student Management</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('professeurs.index') }}"
                                class="nav-link {{ request()->routeIs('professeurs.index') ? 'active' : '' }}">
                                <i class="fa-solid fa-chalkboard-user"></i>
                                <p>Teacher management</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('domaines.index') }}"
                                class="nav-link {{ request()->routeIs('domaines.index') ? 'active' : '' }}">
                                <i class="fas fa-atlas"></i>
                                <p>Field management</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('modules.index') }}"
                                class="nav-link {{ request()->routeIs('modules.index') ? 'active' : '' }}">
                                <i class="fas fa-atlas"></i>
                                <p>Module management</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admins.index') }}"
                                class="nav-link {{ request()->routeIs('admins.index') ? 'active' : '' }}">
                                <i class="fas fa-users-cog"></i>
                                <p>Admins management</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
