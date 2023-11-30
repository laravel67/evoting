<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="{{ asset('user.png') }}" alt="User Image"
            width="50px">
        <div>
            <p class="app-sidebar__user-name">Murtaki, S.Kom</p>
            <p class="app-sidebar__user-designation">Web Developer</p>
        </div>
    </div>
    <ul class="app-menu">
        <li>
            <a class="app-menu__item {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <i class="app-menu__icon fa fa-home"></i><span class="app-menu__label">Dashboard</span>
            </a>
        </li>
        <div>
            <li class="treeview">
                <p class="text-warning p-3 border-bottom">
                    <i class="app-menu__icon fa fa-database"></i>
                    <span class="app-menu__label">Manage Data</span>
                </p>
            </li>
            <li>
                <a class="app-menu__item {{ Request::is('dashboard/users*') ? 'active' : '' }}"
                    href="{{ route('users.index') }}">
                    <i class="app-menu__icon fa fa-address-card"></i><span class="app-menu__label">Data Pemilih</span>
                </a>
            </li>
            <li>
                <a class="app-menu__item {{ Request::is('dashboard/master-data*') ? 'active' : '' }}"
                    href="{{ route('data') }}">
                    <i class="app-menu__icon fa fa-archive"></i><span class="app-menu__label">Masters Data</span>
                </a>
            </li>
        </div>
        <div>
            <li class="treeview">
                <p class="text-warning p-3 border-bottom">
                    <i class="app-menu__icon fa fa-bar-chart"></i>
                    <span class="app-menu__label">Manage Voting</span>
                </p>
            </li>
            <li>
                <a class="app-menu__item {{ Request::is('dashboard/candidates*') ? 'active' : '' }}"
                    href="{{ route('candidates.index') }}">
                    <i class="app-menu__icon fa fa-address-book"></i><span class="app-menu__label">Kandidat BEM</span>
                </a>
            </li>
            <li>

                <a class="app-menu__item {{ Request::is('dashboard/comites*') ? 'active' : '' }}"
                    href="{{ route('comites.index') }}">
                    <i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Penitia</span>
                </a>
            </li>
            
            <li>
                <a class="app-menu__item {{ Request::is('dashboard/hasil*') ? 'active' : '' }}"
                    href="{{ route('result') }}">
                    <i class="app-menu__icon fa fa-bullhorn"></i><span class="app-menu__label">Hasil Voting</span>
                </a>
            </li>
        </div>
    </ul>
</aside>