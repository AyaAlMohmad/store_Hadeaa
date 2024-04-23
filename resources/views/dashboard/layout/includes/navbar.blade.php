<div class="topbar">

    <div class="topbar-left	d-none d-lg-block">
        <div class="text-center">
            
        </div>
    </div>

    <nav class="navbar-custom">

        <!-- Search input -->
        <div class="search-wrap" id="search-wrap">
            <div class="search-bar">
                <input class="search-input" type="search" placeholder="Search" />
                <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                    <i class="mdi mdi-close-circle"></i>
                </a>
            </div>
        </div>

        <ul class="list-inline float-right mb-0">
            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link waves-effect toggle-search" href="#" data-target="#search-wrap">
                    <i class="mdi mdi-magnify noti-icon"></i>
                </a>
            </li>

        


            <li class="list-inline-item dropdown notification-list nav-user">
                <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#"
                    role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="{{ asset('dashboard/assets/images/users/avatar-6.jpg') }}" alt="user"
                        class="rounded-circle">
                    <span class="d-none d-md-inline-block ml-1">{{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown">
                    {{-- <a class="dropdown-item" href="#"><i class="dripicons-user text-muted"></i> Profile</a>
                    <a class="dropdown-item" href="#"><i class="dripicons-wallet text-muted"></i> My Wallet</a>
                    <a class="dropdown-item" href="#"><span
                            class="badge badge-success float-right m-t-5">5</span><i
                            class="dripicons-gear text-muted"></i> Settings</a>
                    <a class="dropdown-item" href="#"><i class="dripicons-lock text-muted"></i> Lock screen</a>
                    <div class="dropdown-divider"></div> --}}
                    <div >
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                         <i class="dripicons-exit text-muted"></i>
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                    {{-- <a class="dropdown-item" href="{{ route('logout') }}"><i class="dripicons-exit text-muted"></i> Logout</a> --}}
                </div>
            </li>

        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="list-inline-item">
                <button type="button" class="button-menu-mobile open-left waves-effect">
                    <i class="mdi mdi-menu"></i>
                </button>
            </li>
            @if ($module_name != 'dash'&& $method_name == 'index' )
                <li class="list-inline-item dropdown notification-list d-none d-sm-inline-block">
                    <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false">
                        Activity <i class="mdi mdi-plus"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-animated">
                        @if ($method_name == 'index' && in_array('create', $module_actions))
                            <a href="{{ route($module_name . '.create') }}" class="btn btn-primary btn-xs"><i
                                    class="ace-icon fa fa-plus"></i> Create item</a>
                        @endif
                        @if ($method_name == 'index' && in_array('destroy', $module_actions))
                        <a href="{{ route($module_name . '.soft') }}" class="btn btn-xs btn-danger"><i
                                class="ace-icon dripicons-trash bigger-120"></i> Recycle Bin</a>
                    @endif
                        {{-- <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Separated link</a> --}}
                    </div>
                </li>
               
            @endif
            <li class="list-inline-item dropdown notification-list d-none d-sm-inline-block">
                @if ($method_name != 'index' )
                <a href="{{ route($module_name . '.index') }}" class="nav-link dropdown-toggle arrow-none waves-effect">
               <i class=" ion ion-md-redo "style="font-size: 20px;"></i>
            </a>
            @endif
            </li>
            {{-- <li class="list-inline-item notification-list d-none d-sm-inline-block">
                <a href="#" class="nav-link waves-effect">
                    Activity
                </a>
            </li> --}}

        </ul>


    </nav>

</div>
