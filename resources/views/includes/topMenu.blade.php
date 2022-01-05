    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-primary navbar-full navbar-fixed-top">

    <!-- Toggle sidebar -->
    <button class="navbar-toggler pull-xs-left" type="button" data-toggle="sidebar" data-target="#sidebarLeft"><span class="material-icons">menu</span></button>

    <!-- Brand -->
    <a href="{{ route('dashboard') }}" class="navbar-brand">{{-- <i class="material-icons">toll</i> --}} Adbirt</a>

    
    <ul class="nav navbar-nav pull-xs-right">
        @include('includes.profileMenu')
    </ul>
    <!-- // END Menu -->

    <!-- Menu -->
    <ul class="nav navbar-nav pull-xs-right">
    <li style="display: inline-block;">
        @include('includes.notificationMenu')
    </li>
    <li style="display: inline-block;">
        @include('includes.popupNotificationMenu')
    </li>
    {{-- <li style="display: inline-block;">
        @include('includes.notificationMenu')
    </li> --}}

    <!-- // END User dropdown -->

    </ul>
    <!-- // END Menu -->


    </nav>
    <!-- // END Navbar -->
