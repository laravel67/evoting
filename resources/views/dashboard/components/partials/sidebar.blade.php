<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <div>
            @if (Auth::user()->image)
                <img class="app-sidebar__user-avatar" src="{{ asset('profile-user/' . Auth::user()->image) }}"
                    style="width: 50px; height:50px;">
            @else
            <img width="48" height="48" src="{{ asset('icons8-user-94.png') }}"/>
            @endif
        </div>
        <div>
            <p class="app-sidebar__user-name">{{ Auth::user()->name }}</p>
            <p class="app-sidebar__user-designation">{{ Auth::user()->username }}</p>
        </div>
    </div>
    <ul class="app-menu">
        <li>
            <a class="app-menu__item {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <i class="app-menu__icon fa fa-home"></i><span class="app-menu__label">Dashboard</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ Request::is('dashboard/profile') ? 'active' : '' }}" href="{{ route('profile') }}">
                <i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Profile</span>
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
