<!-- Topbar Start -->
<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu  mb-0">


        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#"
               role="button" aria-haspopup="false" aria-expanded="false">
                <img src="{{asset('assets/uploads/users/profile/none.jpg')}}" alt="user-image"
                     class="rounded-circle">
                <span class="pro-user-name ml-1">
                                {{@Auth::user()->name.' '.@Auth::user()->family}}
                    <i class="mdi mdi-chevron-down"></i>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right text-right profile-dropdown ">

                <!-- item-->
                <a href="{{route('logout')}}" class="dropdown-item notify-item">
                    <i class="dripicons-power"></i>
                    <span>Logout</span>
                </a>

            </div>
        </li>

        <li class="dropdown notification-list">
            <div class="nav-link dropdown-toggle waves-effect waves-light">
                {{date('l d F')}}
            </div>
        </li>

    </ul>

    <ul class="list-unstyled menu-left mb-0">
        <li >
            <a href="{{route('site.home')}}" class="logo">
                <span class="logo-lg">
                    <img src="{{ $logo }}" alt="{{$setting->title}}"
                         style="width: 55%; background: #fcfcfc;">
                </span>
                <span class="logo-sm">
                    <img src="{{ $logo }}" alt="{{$setting->title}}"
                         style="width: 55%; background: #fcfcfc;">
                 </span>
            </a>
        </li>
        <li class="app-search d-none d-md-block">


        </li>
    </ul>
</div>
<!-- end Topbar -->

