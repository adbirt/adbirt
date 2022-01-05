<div class="sidebar sidebar-left sidebar-light sidebar-visible-md-up si-si-3 ls-top-navbar-xs-up sidebar-transparent-md" id="sidebarLeft" data-scrollable>
    <div class="sidebar-heading">WELCOME HOME</div>
    <ul class="sidebar-menu">
        <li class="{!! Menu::isActiveRoute('dashboard') !!}">
            <a class="sidebar-menu-button" href="{!!  route( 'dashboard') !!}">
                <i class="sidebar-menu-icon material-icons">view_comfy</i> Dashboard
            </a>
        </li>
        @if(Auth::user()->hasRole('admin'))
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="{!! URL::route('pending.index') !!}">
                <i class="sidebar-menu-icon material-icons">account_balance</i> Bank 
                <span class="sidebar-menu-label label label-default">Notification</span> 
            </a>
        </li> 
        <li class="sidebar-menu-item 
        @if( Request::segment(2) == 'requested' ) active @endif
        ">
            <a class="sidebar-menu-button" href="{!! URL::route('withdraw.requested') !!}">
                <i class="sidebar-menu-icon material-icons">account_balance_wallet</i> Withdrawal Requested
            </a>
        </li> 
        <li class="sidebar-menu-item @if( Request::segment(1) == 'campaigns' && Request::segment(2) == 'view' ) active @endif">
            <a class="sidebar-menu-button" href="{!! url('/campaigns/view') !!}">
                <i class="sidebar-menu-icon material-icons">rss_feed</i> Ads 
            </a>
        </li>
    </ul>
    <div class="sidebar-heading">Manage Campaigns Category</div>
    <ul class="sidebar-menu">
        <li class="sidebar-menu-item @if( Request::segment(1) == 'campaigns-category' ) active open @endif">
            <a class="sidebar-menu-button" href="#">
                <i class="sidebar-menu-icon material-icons">tune</i> Manage Category
            </a>
            <ul class="sidebar-submenu sm-condensed">
                <li class="sidebar-menu-item @if( Request::segment(2) == 'add-campaigns-category' ) active @endif">
                    <a class="sidebar-menu-button" href="{{ url('/campaigns-category/add-campaigns-category') }}">Add New Category</a>
                </li>
                <li class="sidebar-menu-item @if( Request::segment(2) == 'view-campaigns-category' ) active @endif">
                    <a class="sidebar-menu-button" href="{{ url('/campaigns-category/view-campaigns-category') }}">View Categories</a>
                </li>
            </ul>
        </li>
    </ul>
    <div class="sidebar-heading">Manage Ads</div>
    <ul class="sidebar-menu">
        <li class="sidebar-menu-item @if( Request::segment(1) == 'campaigns' ) active open @endif">
            <a class="sidebar-menu-button" href="#">
                <i class="sidebar-menu-icon material-icons">tune</i> Manage Ads
            </a>
            <ul class="sidebar-submenu sm-condensed">
                <li class="sidebar-menu-item @if( Request::segment(2) == 'add-campaigns' ) active @endif">
                    <a class="sidebar-menu-button" href="{{ url('/campaigns/add-campaigns') }}">Add New Ads</a>
                </li>
                <li class="sidebar-menu-item @if( Request::segment(2) == 'view-campaigns' ) active @endif">
                    <a class="sidebar-menu-button" href="{{ url('/campaigns/view-campaigns') }}">View Ads</a>
                </li>
            </ul>
        </li>
    </ul>

    <div class="sidebar-heading">Manages Advertisers</div>
    <ul class="sidebar-menu">
        <li class="sidebar-menu-item @if( Request::segment(1) == 'advertiser' ) active open @endif">
            <a class="sidebar-menu-button" href="#">
                <i class="sidebar-menu-icon material-icons">tune</i> Manage Advertisers
            </a>
            <ul class="sidebar-submenu sm-condensed">
                <li class="sidebar-menu-item @if( Request::segment(2) == 'add-advertiser' ) active @endif">
                    <a class="sidebar-menu-button" href="{{ url('/advertiser/add-advertiser') }}">Add New Advertisers</a>
                </li>
                <li class="sidebar-menu-item @if( Request::segment(2) == 'view-advertiser' ) active @endif">
                    <a class="sidebar-menu-button" href="{{ url('/advertiser/view-advertiser') }}">View Advertisers</a>
                </li>
                <li class="sidebar-menu-item @if( Request::segment(2) == 'watchjs' ) active @endif">
                    <a class="sidebar-menu-button" href="{{ url('/advertiser/watchjs') }}">Watch Advertiser JS</a>
                </li>
            </ul>
        </li>
    </ul>
    <div class="sidebar-heading">Manages Commission Ratio</div>
    <ul class="sidebar-menu">
        <li class="sidebar-menu-item @if( Request::segment(1) == 'commission-ratio' ) active open @endif">
            <a class="sidebar-menu-button" href="{{ url('/commission-ratio') }}">
                <i class="sidebar-menu-icon material-icons">tune</i>Commission Ratio
            </a>
        </li>
    </ul>

    <div class="sidebar-heading">APPLICATIONS</div>
    <ul class="sidebar-menu">
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="{!! URL::route('admin.allusers') !!}">
                <i class="sidebar-menu-icon material-icons">supervisor_account</i> All Active Users

            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="{!! route('admin.allusers2') !!}">
                <i class="sidebar-menu-icon material-icons">people_outline</i> All InActive Users

            </a>
        </li>

        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="{!! URL::route('admin.allusers3') !!}">
                <i class="sidebar-menu-icon material-icons">public</i> All Users/Country

            </a>
        </li>


        @elseif(Auth::user()->hasRole('vendor'))
        <div class="sidebar-heading">Manage Ads</div>
        <ul class="sidebar-menu">
            <li class="sidebar-menu-item @if( Request::segment(1) == 'campaigns' ) active open @endif">
                <a class="sidebar-menu-button" href="#">
                    <i class="sidebar-menu-icon material-icons">tune</i> Manage Ads
                </a>
                <ul class="sidebar-submenu sm-condensed">
                    <li class="sidebar-menu-item @if( Request::segment(2) == 'add-campaigns' ) active @endif">
                        <a class="sidebar-menu-button" href="{{ url('/campaigns/add-campaigns') }}">Add New Ads</a>
                    </li>
                    <li class="sidebar-menu-item @if( Request::segment(2) == 'view-campaigns' ) active @endif">
                        <a class="sidebar-menu-button" href="{{ url('/campaigns/view-campaigns') }}">View Ads</a>
                    </li>
                </ul>
            </li>
        </ul>

        <div class="sidebar-heading">Manages Company Profile</div>
        <ul class="sidebar-menu">
            <li class="sidebar-menu-item @if( Request::segment(1) == 'company-profile' ) active open @endif">
                <a class="sidebar-menu-button" href="{{ url('/company-profile') }}">
                    <i class="sidebar-menu-icon material-icons">tune</i>Company Profile
                </a>
            </li>
        </ul>

        <div class="sidebar-heading">Manages Ads</div>
        <li class="sidebar-menu-item @if( Request::segment(1) == 'campaigns' && Request::segment(2) == 'view' ) active @endif">
            <a class="sidebar-menu-button" href="{!! url('/campaigns/active-campaigns') !!}">
                <i class="sidebar-menu-icon material-icons">rss_feed</i>Active Ads 
            </a>
        </li> 

        <div class="sidebar-heading">Wallet History</div>
        <ul class="sidebar-menu">
            <li class="sidebar-menu-item @if( Request::segment(1) == 'wallet' ) active open @endif">
                <a class="sidebar-menu-button" href="#">
                    <i class="sidebar-menu-icon material-icons">tune</i>Manage Wallet
                </a>
                <ul class="sidebar-submenu sm-condensed ">
                    <li class="sidebar-menu-item @if( Request::segment(2) == 'view-wallet-history' ) active @endif">
                        <a class="sidebar-menu-button" href="{{ url('/wallet/view-wallet-history') }}">View Wallet History</a>
                    </li>
                    <li class="sidebar-menu-item @if( Request::segment(2) == 'search-wallet-history' ) active @endif">
                        <a class="sidebar-menu-button" href="{{ url('/wallet/search-wallet-history') }}">Search Wallet History</a>
                    </li>
                </ul>
            </li>
        </ul>

        <div class="sidebar-heading">Other</div>
        <li class="sidebar-menu-item @if( Request::segment(1) == 'campaigns' && Request::segment(2) == 'embedding' ) active @endif">
            <a class="sidebar-menu-button" href="{!! url('/campaigns/embedding') !!}">
                <i class="sidebar-menu-icon material-icons">link</i> Add Ads to Website 
            </a>
        </li> 

        @else

        <li class="sidebar-menu-item @if( Request::segment(1) == 'campaigns' && Request::segment(2) == 'view' ) active @endif">
            <a class="sidebar-menu-button" href="{!! url('/campaigns/view') !!}">
                <i class="sidebar-menu-icon material-icons">rss_feed</i> Ads 
            </a>
        </li> 

        
    

        <div class="sidebar-heading">Wallet History</div>
        <ul class="sidebar-menu">
            <li class="sidebar-menu-item @if( Request::segment(1) == 'wallet' ) active open @endif">
                <a class="sidebar-menu-button" href="#">
                    <i class="sidebar-menu-icon material-icons">tune</i>Manage Wallet
                </a>
                <ul class="sidebar-submenu sm-condensed ">
                    <li class="sidebar-menu-item @if( Request::segment(2) == 'view-wallet-history' ) active @endif">
                        <a class="sidebar-menu-button" href="{{ url('/wallet/view-wallet-history') }}">View Wallet History</a>
                    </li>
                    <li class="sidebar-menu-item @if( Request::segment(2) == 'search-wallet-history' ) active @endif">
                        <a class="sidebar-menu-button" href="{{ url('/wallet/search-wallet-history') }}">Search Wallet History</a>
                    </li>
                </ul>
            </li>
        </ul>
        <div class="sidebar-heading">Running Adverts</div>
        <ul class="sidebar-menu">
            <li class="sidebar-menu-item @if( Request::segment(1) == 'campaigns' && Request::segment(2) == 'view-all' ) active @endif">
                <a class="sidebar-menu-button" href="{!! url('/campaigns/view-all') !!}">
                    <i class="sidebar-menu-icon material-icons">link</i> All Ads 
                </a>
            </li> 
        </ul>
        <div class="sidebar-heading">Other</div>
        <li class="sidebar-menu-item @if( Request::segment(1) == 'campaigns' && Request::segment(2) == 'embedding' ) active @endif">
            <a class="sidebar-menu-button" href="{!! url('/campaigns/embedding') !!}">
                <i class="sidebar-menu-icon material-icons">link</i> Add Ads to Website 
            </a>
        </li> 
       



    @endif

</ul>

</div>

{!! Html::script('dist/vendor/jquery.min.js') !!}
{!! Html::script('dist/vendor/tether.min.js') !!}
{!! Html::script('dist/vendor/bootstrap.min.js') !!}
