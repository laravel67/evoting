 <header class="app-header">
     <a class="app-header__logo text-white">{{ __('E-Voting') }}</a>
     <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
     <ul class="app-nav">
         <!--Notification Menu-->
         <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown"
                 aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i></a>
             <ul class="app-notification dropdown-menu dropdown-menu-right">
                 <li class="app-notification__title">{{ __('Pimilih Terbaru') }}</li>
                 <div class="app-notification__content">
                    <li>
                        <a class="app-notification__item" href="javascript:;">
                            <div id="newVotersContainer">
                            </div>
                        </a>
                    </li>
                 </div>
                 <li class="app-notification__footer"><a href="#showAll" data-toggle="modal">Lihat Semua</a></li>
             </ul>
         </li>
         <!-- User Menu-->
         <li class="">
             <div class="dropdown-item">
                 <form id="out-form" action="{{ route('logout') }}" method="POST">
                     @csrf
                     <button class="dropdown-item text-light border-0 btn-out" type="submit"><i class="fa fa-sign-out fa-lg"></i>
                         Logout</button>
                 </form>
             </div>
         </li>
     </ul>
 </header>

