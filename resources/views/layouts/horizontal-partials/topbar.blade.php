 <!-- Top Bar Start -->
 <div class="topbar">

     <div class="topbar-inner">
         <!-- LOGO -->
         <div class="topbar-left text-center text-lg-left">
             <a href="/home" class="logo">
                 <span style="color: white">
                     <img src="{{ URL::asset('assets/images/kemenag.png') }}" alt="logo-small" class="logo-sm">
                 </span>

             </a>
         </div>
         <!--end logo-->
         <!-- Navbar -->
         <nav class="navbar-custom">
             <ul class="list-unstyled topbar-nav float-right mb-0">



                 <li class="dropdown">
                     <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown"
                         href="#" role="button" aria-haspopup="false" aria-expanded="false">
                         <img src="{{ URL::asset('assets/images/users/user-1.jpg') }}" alt="profile-user"
                             class="rounded-circle" />
                         <span
                             class="ml-1 nav-user-name hidden-sm">{{ Auth::user()->vendor->name ?? Auth::user()->name }}
                             <i class="mdi mdi-chevron-down"></i> </span>
                     </a>
                     <div class="dropdown-menu dropdown-menu-right">

                         <div class="dropdown-divider mb-0"></div>
                         <a class="dropdown-item" href="/logout"><i class="ti-power-off text-muted mr-2"></i>
                             Logout</a>
                     </div>
                 </li>
                 <!--end menu item-->
             </ul>
             <!--end topbar-nav-->

         </nav>
         <!-- end navbar-->
     </div>
     <!--topbar-inner-->
 </div>
 <!-- Top Bar End -->
