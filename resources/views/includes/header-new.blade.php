<?php

use App\Model\NotificationAlertModel;

$Notify = json_decode(
    json_encode(
        NotificationAlertModel::where('status', 'Unseen')
            ->where('Notify_Receivers_Id', Auth::user()->id)
            ->orderBy('id', 'desc')
            ->get(),
    ),
    true,
);

$NotifyCnt = count($Notify);

?>

<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center" style="height: 0px;">
    <img class="animation__shake" src="https://adbirt.com/public/assets-revamp/img/adbirt-sidebar-logo.png"
        alt="Adbirt Logo" height="50" width="160" style="display: none;">
</div>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light fixed-top bg-light pr-4 shadow-sm">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                    class="fa fa-bars text-primary-color"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link text-primary-color font-weight-bold">
                {!! Auth::user()->hasRole('admin') ? 'Admin' : (Auth::user()->hasRole('vendor') ? 'Advertiser' : 'Publisher') !!} Dashboard

                @if (ucfirst($title) != 'Dashboard')
                    &nbsp;
                    &#124;
                    &nbsp;
                    {!! $title !!}
                @endif
            </a>
        </li>
        {{-- <li class="nav-item d-none d-sm-inline-block">
            <a href="https://adbirt.com/" class="nav-link text-dark">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="https://adbirt.com/contact" class="nav-link text-dark">Contact</a>
        </li> --}}
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        &nbsp;
        <!-- Navbar Search -->
        <!-- <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fa fa-search text-dark"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fa fa-search text-dark"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fa fa-times text-dark"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li> -->

        <!-- Messages Dropdown Menu -->
        <!-- <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fa fa-comments text-dark"></i>
                <span class="badge badge-danger navbar-badge text-dark">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <div class="media">
                        <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Brad Diesel
                                <span class="float-right text-sm text-danger"><i class="fa fa-star"></i></span>
                            </h3>
                            <p class="text-sm">Call me whenever you can...</p>
                            <p class="text-sm text-muted"><i class="fa fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li> -->

        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link btn mx-1 text-primary-color p-2" data-toggle="dropdown" href="#">
                <i class="fa fa-bell fa-lg"></i>
                @if ($NotifyCnt >= 1)
                    <span class="badge badge-warning navbar-badge" style="font-size: 14px;">
                        {{ $NotifyCnt }}
                    </span>
                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right"
                style="text-overflow: ellipsis !important; overflow: hidden !important;">
                @if ($NotifyCnt >= 1)
                    <span class="dropdown-item dropdown-header">
                        {{ $NotifyCnt }} Notifications
                    </span>
                @endif
                @if (!empty($Notify))
                    <script type="text/javascript">
                        var baseUrl = "{{ url('/') }}"

                        window.viewSingleNotification = function viewSingleNotification(id) {
                            $.ajax({
                                    url: baseUrl + '/notify/ChngeStatus',
                                    type: 'POST',
                                    data: {
                                        id: id
                                    },
                                })
                                .done(function() {
                                    window.location.href = "{{ url('/notify/view-notifications') }}";
                                })
                        };

                        window.viewAllNotifications = function viewAllNotifications(status) {
                            $.ajax({
                                    url: baseUrl + '/notify/ChngeStatus',
                                    type: 'POST',
                                    data: {
                                        id: status
                                    },
                                })
                                .done(function() {
                                    window.location.href = "{{ url('/notify/view-notifications') }}";
                                })
                        };
                    </script>
                    @foreach (array_slice($Notify, 0, 5, true) as $single_notification)
                        <div class="dropdown-divider"></div>
                        <a onclick="viewSingleNotification({{ $single_notification['id'] }})"
                            class="dropdown-item p-2 cursor-pointer">
                            <i class="fa fa-envelope mr-2"></i> {{ $single_notification['heading'] }}
                            <!-- <span class="float-right text-muted text-sm">3 mins</span> -->
                        </a>
                    @endforeach
                    <div class="dropdown-divider"></div>
                    <a onclick="viewAllNotifications('Chnge')" class="dropdown-item dropdown-footer">See All
                        Notifications</a>
                @else
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fa fa-envelope mr-2"></i> No new notification
                    </a>
                @endif
            </div>
        </li>
        <!-- Help Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link btn mx-1 text-primary-color p-2" data-toggle="help" href="#">
                <i class="fa fa-question fa-lg"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right"
                style="text-overflow: ellipsis !important; overflow: hidden !important;">
                <span class="dropdown-item dropdown-header">
                    Help Center
                </span>

                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item p-2 cursor-pointer">
                    <i class="fa fa-help mr-2"></i> Tour Gide
                </a>

                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item p-2 cursor-pointer">
                    <i class="fa fa-help mr-2"></i> FAQs
                </a>

                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item p-2 cursor-pointer">
                    <i class="fa fa-help mr-2"></i> Contact Us
                </a>

            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link btn mx-1 text-primary-color p-2" href="javascript:alert('Coming soon')" role="button"
                title="Help">
                <i class="fa fa-question fa-lg"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link btn mx-1 text-primary-color p-2" data-widget="fullscreen" href="#" role="button">
                <i class="fa fa-expand-arrows-alt fa-lg"></i>
            </a>
        </li>
        <li class="nav-item">
            <a href="{!! route('logout') !!}"
                class="nav-link btn btn-danger d-flex flex-row align-items-center justify-content-between text-white">
                <i class="nav-icon fa fa-sign-out"></i>
                &nbsp;
                <p class="font-weight-bold m-0">
                    Logout
                    <!-- <span class="right badge badge-danger">New</span> -->
                </p>
            </a>
        </li>

        <!-- <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fa fa-th-large"></i>
            </a>
        </li> -->
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    {{-- <a href="/dashboard" class="brand-link w-100 d-flex flex-row justify-content-center">
        <img src="https://adbirt.com/public/assets-revamp/img/adbirt-sidebar-logo.png" alt="Adbirt.com"
            class="w-75 elevation-3 shadow-sm">
        <span class="brand-text font-weight-light">Adbirt</span>
    </a> --}}

    <!-- Sidebar -->
    <div
        class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition">
        <div class="os-resize-observer-host observed">
            <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
        </div>
        <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
            <div class="os-resize-observer"></div>
        </div>
        <div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 208px;">&nbsp;</div>
        <div class="os-padding">
            <div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;">
                <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
                    <!-- Brand Logo -->
                    <a href="/dashboard" class="brand-link w-100 d-flex flex-row justify-content-center">
                        <img src="https://adbirt.com/public/assets-revamp/img/adbirt-sidebar-logo.png" alt="Adbirt.com"
                            class="w-75 elevation-3 shadow-sm">
                        {{-- <span class="brand-text font-weight-light">Adbirt</span> --}}
                    </a>
                    <!-- Sidebar user panel (optional) -->
                    @if (Auth::user()->profile)
                        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                            <div class="image">
                                <?php
                                $profilePhotoUrl = strip_tags(substr(Auth::user()->profile->propic, 0, 4) == 'http' ? Auth::user()->profile->propic : (substr(Auth::user()->profile->propic, 0, 8) == '/uploads' ? 'https://adbirt.com/public' . Auth::user()->profile->propic : Auth::user()->profile->propic)) . '';
                                if (strlen($profilePhotoUrl) == 0) {
                                    $profilePhotoUrl = 'https://adbirt.com/public/assets-revamp/img/avatar.png';
                                }
                                ?>
                                <img src="{!! $profilePhotoUrl !!}" width="160" height="160"
                                    style="width: 160 !important; height: 160 !important;"
                                    class="img-circle elevation-2" alt="{!! Auth::user()->name !!}">
                            </div>
                            <div class="info">
                                <a href="{!! route('profile') !!}" class="d-block">{{ Auth::user()->name }}</a>
                            </div>
                        </div>
                    @endif

                    <!-- SidebarSearch Form -->
                    <!-- <div class="form-inline">
                        <div class="input-group" data-widget="sidebar-search">
                            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-sidebar">
                                    <i class="fa fa-search fa-fw"></i>
                                </button>
                            </div>
                        </div>
                        <div class="sidebar-search-results">
                            <div class="list-group"><a href="#" class="list-group-item">
                                    <div class="search-title"><strong class="text-light"></strong>N<strong class="text-light"></strong>o<strong class="text-light"></strong>
                                        <strong class="text-light"></strong>e<strong class="text-light"></strong>l<strong class="text-light"></strong>e<strong class="text-light"></strong>m<strong class="text-light"></strong>e<strong class="text-light"></strong>n<strong class="text-light"></strong>t<strong class="text-light"></strong>
                                        <strong class="text-light"></strong>f<strong class="text-light"></strong>o<strong class="text-light"></strong>u<strong class="text-light"></strong>n<strong class="text-light"></strong>d<strong class="text-light"></strong>!<strong class="text-light"></strong>
                                    </div>
                                    <div class="search-path"></div>
                                </a></div>
                        </div>
                    </div> -->

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                            <li class="nav-header">WELCOME HOME</li>
                            <li class="nav-item">
                                <a href="{!! route('dashboard') !!}" class="nav-link  @if (Request::segment(1) == 'dashboard') active @endif">
                                    <i class="nav-icon fa fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                        <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>

                            @if (Auth::user()->hasRole('admin'))
                                <!-- ===== Begin Admin Menu ===== -->
                                <li class="nav-item">
                                    <a href="{!! URL::route('pending.index') !!}" class="nav-link @if (Request::segment(1) == 'pending' && Request::segment(2) == 'index') active @endif">
                                        <i class="nav-icon fa fa-university text-light"></i>
                                        <p>
                                            Bank
                                            <span class="right badge badge-danger">Notifications</span>
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{!! URL::route('withdraw.requested') !!}" class="nav-link @if (Request::segment(2) == 'requested') active @endif">
                                        <i class="nav-icon fa fa-money-bill-wave text-light"></i>
                                        <p>
                                            Withdrawal history
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-header">CAMPAIGN MANAGEMENT</li>
                                <li class="nav-item menu-open">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fa fa-circle"></i>
                                        <p>
                                            Manage Ads
                                            <i class="right fa fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ url('/campaigns/add-campaigns') }}"
                                                class="nav-link @if (Request::segment(2) == 'add-campaigns') active @endif">
                                                <i class="fa fa-plus nav-icon"></i>
                                                <p>Add New Ads</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ url('/campaigns/view-campaigns') }}"
                                                class="nav-link @if (Request::segment(2) == 'view-campaigns') active @endif">
                                                <i class="fa fa-eye nav-icon"></i>
                                                <p>View all Ads</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{!! url('/campaigns/view') !!}"
                                                class="nav-link @if (Request::segment(1) == 'campaigns' && Request::segment(2) == 'view') active @endif">
                                                <i class="nav-icon fa fa-check text-light"></i>
                                                <p>
                                                    Active Ads
                                                </p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-header">CAMPAIGN CATEGORIES</li>
                                <li class="nav-item menu-open">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fa fa-circle"></i>
                                        <p>
                                            Manage categories
                                            <i class="right fa fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ url('/campaigns-category/add-campaigns-category') }}"
                                                class="nav-link @if (Request::segment(2) == 'add-campaigns-category') active @endif">
                                                <i class="fa fa-plus nav-icon"></i>
                                                <p>Add New Category</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ url('/campaigns-category/view-campaigns-category') }}"
                                                class="nav-link @if (Request::segment(2) == 'view-campaigns-category') active @endif">
                                                <i class="fa fa-eye nav-icon"></i>
                                                <p>View Categories</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-header">ADVERTISERS</li>
                                <li class="nav-item menu-open">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fa fa-circle"></i>
                                        <p>
                                            Manage Advertisers
                                            <i class="right fa fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        {{-- <li class="nav-item">
                                        <a href="{{ url('/advertiser/add-advertiser') }}" class="nav-link @if (Request::segment(2) == 'add-advertiser') active @endif">
                                            <i class="fa fa-plus nav-icon"></i>
                                            <p>Add New Advertiser</p>
                                        </a>
                                    </li> --}}
                                        <li class="nav-item">
                                            <a href="{{ url('/advertiser/view-advertiser') }}"
                                                class="nav-link @if (Request::segment(2) == 'view-advertiser') active @endif">
                                                <i class="fa fa-eye nav-icon"></i>
                                                <p>View Advertisers</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ url('/advertiser/watchjs') }}"
                                                class="nav-link @if (Request::segment(2) == 'watchjs') active @endif">
                                                <i class="fa fa-eye nav-icon"></i>
                                                <p>Watch Advertiser JS</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-header">COMMISSION RATIO</li>
                                <li class="nav-item">
                                    <a href="{{ url('/commission-ratio') }}"
                                        class="nav-link @if (Request::segment(1) == 'commission-ratio') active open @endif">
                                        <i class="nav-icon fa fa-sliders-h text-light"></i>
                                        <p>
                                            Edit Commission ratio
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-header">USERS</li>
                                <li class="nav-item">
                                    <a href="{!! URL::route('admin.allusers') !!}" class="nav-link @if (Request::segment(1) == 'allUsers') active @endif">
                                        <i class="nav-icon fa fa-user-check text-light"></i>
                                        <p>
                                            All Active Users
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{!! route('admin.allusers2') !!}" class="nav-link @if (Request::segment(1) == 'allUsersInactive') active @endif">
                                        <i class="nav-icon fa fa-user-times text-light"></i>
                                        <p>
                                            All Inactive Users
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{!! route('admin.allusers3') !!}" class="nav-link @if (Request::segment(1) == 'allUsersByCountry') active @endif">
                                        <i class="nav-icon fa fa-users text-light"></i>
                                        <p>
                                            All Users/Countries
                                        </p>
                                    </a>
                                </li>
                                <!-- ===== End Admin ===== -->
                            @elseif(Auth::user()->hasRole('vendor'))
                                <!-- ===== Begin vendor/advertiser ===== -->
                                <li class="nav-header">MANAGE</li>
                                <li class="nav-item menu-open">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fa fa-circle"></i>
                                        <p>
                                            Manage Ads
                                            <i class="right fa fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ url('/campaigns/add-campaigns') }}"
                                                class="nav-link @if (Request::segment(2) == 'add-campaigns') active @endif">
                                                <i class="fa fa-plus nav-icon"></i>
                                                <p>Add new Ads</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ url('/campaigns/view-campaigns') }}"
                                                class="nav-link @if (Request::segment(2) == 'view-campaigns') active @endif">
                                                <i class="fa fa-eye nav-icon"></i>
                                                <p>View My Ads</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ url('/campaigns/active-campaigns') }}"
                                                class="nav-link @if (Request::segment(1) == 'campaigns' && Request::segment(2) == 'active-campaigns') active @endif">
                                                <i class="fa fa-check nav-icon"></i>
                                                <p>Active Ads</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item menu-open">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fa fa-users"></i>
                                        <p>
                                            Company Profile
                                            <i class="right fa fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ url('/company-profile') }}"
                                                class="nav-link @if (Request::segment(1) == 'company-profile') active @endif">
                                                <i class="fa fa-users nav-icon"></i>
                                                <p>Company Profile</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-header">WALLET HISTORY</li>
                                <li class="nav-item menu-open">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fa fa-money"></i>
                                        <p>
                                            Manage wallet
                                            <i class="right fa fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ url('/wallet/view-wallet-history') }}"
                                                class="nav-link @if (Request::segment(2) == 'view-wallet-history') active @endif">
                                                <i class="fa fa-credit-card nav-icon"></i>
                                                <p>View wallet history</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ url('/wallet/search-wallet-history') }}"
                                                class="nav-link @if (Request::segment(2) == 'search-wallet-history') active @endif">
                                                <i class="fa fa-credit-card nav-icon"></i>
                                                <p>Search wallet history</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-header">OTHER</li>
                                <li class="nav-item">
                                    <a href="{!! url('/campaigns/embedding') !!}" class="nav-link">
                                        <i class="nav-icon fa fa-globe"></i>
                                        <p>
                                            Add Ads to website
                                            <!-- <span class="right badge badge-danger">New</span> -->
                                        </p>
                                    </a>
                                </li>
                                <!-- ===== End vendor/Advertiser ===== -->
                            @else
                                <!-- ===== Begin Other (publishers) ===== -->
                                <li class="nav-header">CAMPAIGN MANAGEMENT</li>
                                <li class="nav-item">
                                    <a href="{!! url('/campaigns/view') !!}" class="nav-link @if (Request::segment(1) == 'campaigns' && Request::segment(2) == 'view') active @endif">
                                        <i class="nav-icon fa fa-ad"></i>
                                        <p>
                                            Available Ads
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{!! url('/campaigns/view-all') !!}" class="nav-link @if (Request::segment(1) == 'campaigns' && Request::segment(2) == 'view-all') active @endif">
                                        <i class="nav-icon fa fa-check"></i>
                                        <p>
                                            Running Ads
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-header">WALLET HISTORY</li>
                                <li class="nav-item menu-open">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fa fa-wallet"></i>
                                        <p>
                                            Manage wallet
                                            <i class="right fa fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ url('/wallet/view-wallet-history') }}"
                                                class="nav-link @if (Request::segment(2) == 'view-wallet-history') active @endif">
                                                <i class="fa fa-history nav-icon"></i>
                                                <p>View wallet history</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ url('/wallet/search-wallet-history') }}"
                                                class="nav-link @if (Request::segment(2) == 'search-wallet-history') active @endif">
                                                <i class="fa fa-search-dollar nav-icon"></i>
                                                <p>Search wallet history</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-header">OTHER</li>
                                <li class="nav-item">
                                    <a href="{!! url('/campaigns/embedding') !!}" class="nav-link">
                                        <i class="nav-icon fa fa-globe"></i>
                                        <p>
                                            Add Ads to website
                                            <!-- <span class="right badge badge-danger">New</span> -->
                                        </p>
                                    </a>
                                </li>

                                <!-- <li class="nav-item">
                                <a href="pages/widgets.html" class="nav-link">
                                    <i class="nav-icon fa fa-circle"></i>
                                    <p>
                                        Widgets
                                        <span class="right badge badge-danger">New</span>
                                    </p>
                                </a>
                            </li> -->

                                <!-- ===== End other ===== -->
                            @endif

                            <li class="nav-header">---</li>
                            <li class="nav-item">
                                <a href="{!! route('logout') !!}" class="nav-link">
                                    <i class="nav-icon fa fa-door-open"></i>
                                    <p class="font-weight-bold">
                                        Logout
                                        <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>

                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
            </div>
        </div>
        <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable">
            <div class="os-scrollbar-track">
                <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div>
            </div>
        </div>
        <div class="os-scrollbar os-scrollbar-vertical">
            <div class="os-scrollbar-track">
                <div class="os-scrollbar-handle" style="height: 15.4016%; transform: translate(0px, 0px);">
                </div>
            </div>
        </div>
        <div class="os-scrollbar-corner"></div>
    </div>
    <!-- /.sidebar -->
</aside>


<!-- Begin main content wrapper -->
<div class="content-wrapper" style="min-height: 152px;">
    <!-- Content Header (Page header) -->
    <div class="content-header mb-5">
        <div class="container-fluid">
            <div class="row mb-2 justify-content-between container-fluid">
                <div class="col-sm-6---">
                    {{-- <h1 class="m-0">{!! $title !!}</h1> --}}
                </div>
                {{-- <a href="{!! route('logout') !!}"
                    class="nav-link text-dark btn-danger text-white rounded px-4 font-weight-bold">Logout</a> --}}
                <!-- /.col -->
                {{-- <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{!! route('dashboard') !!}">Home</a></li>
                        <li class="breadcrumb-item active">{!! $title !!}</li>
                    </ol>
                </div> --}}
                <!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- # End header -->


    <!-- ======================= -->
