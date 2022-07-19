@extends('layouts.modern-camp-layout')

@section('content')
    <?php
    if (Auth::user()->profile) {
        $profilePhotoUrl = strip_tags(substr(Auth::user()->profile->propic, 0, 4) == 'http' ? Auth::user()->profile->propic : (substr(Auth::user()->profile->propic, 0, 8) == '/uploads' ? 'https://adbirt.com/public' . Auth::user()->profile->propic : Auth::user()->profile->propic)) . '';
        if (strlen($profilePhotoUrl) == 0) {
            $profilePhotoUrl = 'https://adbirt.com/public/assets-revamp/img/avatar.png';
        }
    }
    ?>

    <div class="col-md-3 col-md-offset-0 col-sm-8 col-sm-offset-2 col-xs-12">
        <div class="profile">
            <div class="profile_inner">
                <img src="{!! $profilePhotoUrl !!}" alt="{!! Auth::user()->name !!}">
                <h4 class="user_name">{!! Auth::user()->name !!}</h4>
                <p class="user_credit">Balance : $150</p>
            </div>
        </div>
        <div class="options_grp">
            <ul class="list-group ui-tabs-nav ui-corner-all ui-helper-reset ui-helper-clearfix ui-widget-header"
                role="tablist">
                <li class="list-group-item ui-tabs-tab ui-corner-top ui-state-default ui-tab ui-tabs-active ui-state-active"
                    role="tab" tabindex="0" aria-controls="tabs-1" aria-labelledby="ui-id-1" aria-selected="true"
                    aria-expanded="true"><a
                        href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/index.html#tabs-1"
                        role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-1">Overview</a></li>
                <li class="list-group-item ui-tabs-tab ui-corner-top ui-state-default ui-tab" role="tab" tabindex="-1"
                    aria-controls="tabs-2" aria-labelledby="ui-id-2" aria-selected="false" aria-expanded="false"><a
                        href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/index.html#tabs-2"
                        role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-2">Campaign</a></li>
                <li class="list-group-item ui-tabs-tab ui-corner-top ui-state-default ui-tab" role="tab" tabindex="-1"
                    aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false"><a
                        href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/index.html#tabs-3"
                        role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Opportunities</a></li>
                <li class="list-group-item ui-tabs-tab ui-corner-top ui-state-default ui-tab" role="tab" tabindex="-1"
                    aria-controls="tabs-4" aria-labelledby="ui-id-4" aria-selected="false" aria-expanded="false"><a
                        href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/index.html#tabs-4"
                        role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-4">Reports</a></li>
            </ul>
            <a class="log1452"
                href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/login.html">Logout</a>
        </div>
    </div>


    <div class="tabs_1 ui-tabs-panel ui-corner-bottom ui-widget-content" id="tabs-1" aria-labelledby="ui-id-1"
        role="tabpanel" aria-hidden="false">
        <div class="col-md-9 col-sm-12 col-xs-12 zero-padding filter-sec">
            <div class="col-md-6 col-sm-6 col-xs-12 search-filter">
                <span class="search_btn"><i class="fas fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 filter-id">
                <div class="text-right">
                    <p> Mediacamp ID :<span class="defualt_clr">123456789</span></p>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="custom-selection">
            <div class="col-md-3 col-sm-6 col-xs-12 margin_btm">
                <div id="post" class="btn-group dropdown">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span>Account : <span id="selected-post" style="color:#e53632">John
                                Doe</span></span> <span class="fas fa-angle-down"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu1">
                        <li>
                            <p><span style="color:#e53632">John Doe 1</span></p>
                        </li>
                        <li>
                            <p><span style="color:#e53632">John Doe 2</span></p>
                        </li>
                        <li>
                            <p><span style="color:#e53632">John Doe 3</span></p>
                        </li>
                        <li>
                            <p><span style="color:#e53632">John Doe 4</span></p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 margin_btm">
                <div id="my-campaign" class="btn-group dropdown">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span id="selected-campaign">All Campaigns</span> <span class="fas fa-angle-down"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu2">
                        <li>
                            <p>Campaigns one</p>
                        </li>
                        <li>
                            <p>Campaigns Two</p>
                        </li>
                        <li>
                            <p>Campaigns Three</p>
                        </li>
                        <li>
                            <p>Campaigns Four</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 margin_btm">
                <div id="my-range" class="btn-group dropdown">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span>Range : <span id="selected-range" style="color:#e53632">Mar 2018, Apr
                                2018</span></span> <span class="fas fa-angle-down"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu3">
                        <li>
                            <p><span style="color:#e53632">Apr 2020, May 2020</span></p>
                        </li>
                        <li>
                            <p><span style="color:#e53632">May 2020, Jun 2020</span></p>
                        </li>
                        <li>
                            <p><span style="color:#e53632">Jun 2020, Jul 2020</span></p>
                        </li>
                        <li>
                            <p><span style="color:#e53632">Jul 2020, Aug 2020</span></p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-sm-12 zero-padding">
            <div class="col-md-12 graph-section">
                <h4>Performance Graph</h4>
                <div class="graph_outer">
                    <div id="chartContainer" style="height: 300px; width: 100%;">
                        <div class="canvasjs-chart-container" style="position: relative; text-align: left; cursor: auto;">
                            <canvas class="canvasjs-chart-canvas" width="781" height="300"
                                style="position: absolute;"></canvas><canvas class="canvasjs-chart-canvas" width="781"
                                height="300"
                                style="position: absolute; -webkit-tap-highlight-color: transparent; cursor: default;"></canvas>
                            <div class="canvasjs-chart-toolbar"
                                style="position: absolute; right: 1px; top: 1px; border: 1px solid transparent;">
                            </div>
                            <div class="canvasjs-chart-tooltip"
                                style="position: absolute; height: auto; box-shadow: rgba(0, 0, 0, 0.1) 1px 1px 2px 2px; z-index: 1000; pointer-events: none; display: none; border-radius: 0px; left: 189px; bottom: -159.62px; transition: left 0.1s ease-out 0s, bottom 0.1s ease-out 0s;">
                                <div
                                    style="width: auto; height: auto; min-width: 50px; margin: 0px; padding: 5px; font-family: 'Trebuchet MS', Helvetica, sans-serif; font-weight: normal; font-style: normal; font-size: 14px; color: black; text-shadow: rgba(0, 0, 0, 0.1) 1px 1px 1px; text-align: left; border: 1px solid rgb(155, 187, 88); background: rgba(255, 255, 255, 0.9); text-indent: 0px; white-space: nowrap; border-radius: 0px; user-select: none;">
                                    <span style="color:#9BBB58;">26 Jul 17:</span>&nbsp;&nbsp;23
                                </div>
                            </div><a class="canvasjs-chart-credit" title="JavaScript Charts"
                                style="outline:none;margin:0px;position:absolute;right:2px;top:286px;color:dimgrey;text-decoration:none;font-size:11px;font-family: Calibri, Lucida Grande, Lucida Sans Unicode, Arial, sans-serif"
                                tabindex="-1" target="_blank" href="https://canvasjs.com/">CanvasJS.com</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 graph_details">
                <h6 class="first">Geotargetted</h6>
                <p>$12 / Day - Active</p>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 graph_details">
                <h6 class="second">National</h6>
                <p>$13 / Day - Active</p>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 graph_details">
                <h6 class="third">International</h6>
                <p>$15 / Day - Active</p>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 graph_details">
                <h6 class="fourth">Mobile &amp; Content</h6>
                <p>$10 / Day - Active</p>
            </div>
            <div class="col-md-12 table-section">
                <h4>Campaigns</h4>
                <div class="table-outer">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Title Campaign Name</th>
                                <th scope="col">Cost<i class="fas fa-angle-down"></i></th>
                                <th scope="col">Clicks <i class="fas fa-angle-down"></i></th>
                                <th scope="col">Conversions <i class="fas fa-angle-down"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Campaign Name</th>
                                <td>-$6.50<i class="fas fa-angle-down"></i>
                                    <p>-0.30%</p>
                                </td>
                                <td>-$4.00<i class="fas fa-angle-down"></i>
                                    <p>-0.30%</p>
                                </td>
                                <td>+1<i class="fas fa-angle-up"></i>
                                    <p>12 Total</p>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Campaign Name</th>
                                <td>-$6.50<i class="fas fa-angle-down"></i>
                                    <p>-0.30%</p>
                                </td>
                                <td>-$4.00<i class="fas fa-angle-down"></i>
                                    <p>-0.30%</p>
                                </td>
                                <td>+1<i class="fas fa-angle-up"></i>
                                    <p>12 Total</p>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Campaign Name</th>
                                <td>-$6.50<i class="fas fa-angle-down"></i>
                                    <p>-0.30%</p>
                                </td>
                                <td>-$4.00<i class="fas fa-angle-down"></i>
                                    <p>-0.30%</p>
                                </td>
                                <td>+1<i class="fas fa-angle-up"></i>
                                    <p>12 Total</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="tabs_2 ui-tabs-panel ui-corner-bottom ui-widget-content" id="tabs-2" aria-labelledby="ui-id-2"
        role="tabpanel" aria-hidden="true" style="display: none;">
        <div class="col-md-9 col-sm-12 col-xs-12">
            <div id="my-campaign1" class="btn-group dropdown">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span id="campaign_post">All Enable campaign</span> <span class="fas fa-angle-down"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu4">
                    <li>
                        <p>All Enable campaign</p>
                    </li>
                    <li>
                        <p>campaign 01</p>
                    </li>
                    <li>
                        <p>campaign 02</p>
                    </li>
                    <li>
                        <p>campaign 03</p>
                    </li>
                    <li>
                        <p>campaign 04</p>
                    </li>
                </ul>
            </div>
            <div id="my-filters" class="btn-group dropdown">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span id="filters_post">Filters </span><span class="fas fa-angle-down"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu5">
                    <li>
                        <p>Filters 01</p>
                    </li>
                    <li>
                        <p>Filters 02</p>
                    </li>
                    <li>
                        <p>Filters 03</p>
                    </li>
                    <li>
                        <p>Filters 04</p>
                    </li>
                </ul>
            </div>
            <div id="my-column" class="btn-group dropdown">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span id="column_post">Column </span><span class="fas fa-angle-down"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu6">
                    <li>
                        <p>Column 01</p>
                    </li>
                    <li>
                        <p>Column 02</p>
                    </li>
                    <li>
                        <p>Column 03</p>
                    </li>
                    <li>
                        <p>Column 04</p>
                    </li>
                </ul>
            </div>
            <div class="service_icon">
                <div class="icon">
                    <a
                        href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/index.html#"><img
                            src="/public/ModernCamp_files/services_1.png" alt=""></a>
                </div>
            </div>
            <div class="search-filter">
                <span class="search_btn"><i class="fas fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
            </div>
            <div id="my-clicks" class="btn-group dropdown">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="red"></span><span id="clicks_post">clicks </span><span
                        class="fas fa-angle-down"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu7">
                    <li>
                        <p>500</p>
                    </li>
                    <li>
                        <p>1000</p>
                    </li>
                    <li>
                        <p>5000</p>
                    </li>
                    <li>
                        <p>10000</p>
                    </li>
                </ul>
            </div>
            <div id="my-cost" class="btn-group dropdown">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="purple"></span><span id="cost_post">cost </span><span class="fas fa-angle-down"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu8">
                    <li>
                        <p>$50</p>
                    </li>
                    <li>
                        <p>$100</p>
                    </li>
                    <li>
                        <p>$500</p>
                    </li>
                    <li>
                        <p>$100</p>
                    </li>
                </ul>
            </div>
            <div id="days" class="btn-group dropdown">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span id="days_post">Daily </span><span class="fas fa-angle-down"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu9">
                    <li>
                        <p>weekly</p>
                    </li>
                    <li>
                        <p>monthly</p>
                    </li>
                    <li>
                        <p>semi-annauly</p>
                    </li>
                    <li>
                        <p>annualy</p>
                    </li>
                </ul>
            </div>
            <div class="col-md-12 zero-padding graph-section">
                <div class="graph_2">
                    <div id="chartContainer2" style="height: 120px; width: 100%;">
                        <div class="canvasjs-chart-container" style="position: relative; text-align: left; cursor: auto;">
                            <canvas class="canvasjs-chart-canvas" width="825" height="120"
                                style="position: absolute;"></canvas><canvas class="canvasjs-chart-canvas" width="825"
                                height="120"
                                style="position: absolute; -webkit-tap-highlight-color: transparent;"></canvas>
                            <div class="canvasjs-chart-toolbar"
                                style="position: absolute; right: 1px; top: 1px; border: 1px solid transparent;">
                            </div>
                            <div class="canvasjs-chart-tooltip"
                                style="position: absolute; height: auto; box-shadow: rgba(0, 0, 0, 0.1) 1px 1px 2px 2px; z-index: 1000; pointer-events: none; display: none; border-radius: 5px;">
                                <div
                                    style=" width: auto;height: auto;min-width: 50px;line-height: auto;margin: 0px 0px 0px 0px;padding: 5px;font-family: Calibri, Arial, Georgia, serif;font-weight: normal;font-style: italic;font-size: 14px;color: #000000;text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.1);text-align: left;border: 2px solid gray;background: rgba(255,255,255,.9);text-indent: 0px;white-space: nowrap;border-radius: 5px;-moz-user-select:none;-khtml-user-select: none;-webkit-user-select: none;-ms-user-select: none;user-select: none;">
                                    Sample Tooltip</div>
                            </div><a class="canvasjs-chart-credit" title="JavaScript Charts"
                                style="outline:none;margin:0px;position:absolute;right:2px;top:106px;color:dimgrey;text-decoration:none;font-size:11px;font-family: Calibri, Lucida Grande, Lucida Sans Unicode, Arial, sans-serif"
                                tabindex="-1" target="_blank" href="https://canvasjs.com/">CanvasJS.com</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 zero-padding campaign_margin">
                <a href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/campaign.html"
                    class="comp_btn tab_btn">Create new campaign</a>
                <div id="my-Editer" class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span id="Edit_post">Edit<span class="fas fa-angle-down"></span></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a
                                href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/index.html#">Enable</a>
                        </li>
                        <li><a
                                href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/index.html#">Pause</a>
                        </li>
                        <li><a
                                href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/index.html#">Remove</a>
                        </li>
                        <li><a
                                href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/index.html#">Download
                                Spreadsheet</a></li>
                        <li><a
                                href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/index.html#">Recent
                                Bulk Edits</a></li>
                    </ul>
                </div>
                <div id="my-Bid" class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span id="Bid_post">Bid Strategy<span class="fas fa-angle-down"></span></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a
                                href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/index.html#">High</a>
                        </li>
                        <li><a
                                href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/index.html#">Medium</a>
                        </li>
                        <li><a
                                href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/index.html#">Low</a>
                        </li>
                    </ul>
                </div>
                <div id="my-Labels" class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span id="labels_post">Labels<span class="fas fa-angle-down"></span></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a
                                href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/index.html#">#1</a>
                        </li>
                        <li><a
                                href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/index.html#">#2</a>
                        </li>
                        <li><a
                                href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/index.html#">#3</a>
                        </li>
                        <li><a
                                href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/index.html#">#4</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div style="overflow-x:auto;" class="table_tab2 col-md-12 zero-padding">
                <table>
                    <tbody>
                        <tr>
                            <th>Campaign</th>
                            <th>Budget</th>
                            <th>Status</th>
                            <th>Clicks</th>
                            <th>Impr.</th>
                            <th>CTR</th>
                            <th class="avg">Avg. CPC</th>
                            <th>Cost</th>
                            <th>Avg. Post</th>
                            <th>Points</th>
                            <th>Points</th>
                            <th>Points</th>
                        </tr>
                        <tr>
                            <td>Campaign 01</td>
                            <td>$100<p>Daily</p>
                            </td>
                            <td class="elegible">Elegible</td>
                            <td class="clr_99a">255</td>
                            <td class="clr_99a">2158</td>
                            <td class="clr_99a">11.11%</td>
                            <td class="clr_99a">$6.27</td>
                            <td class="clr_99a">$21597.00</td>
                            <td class="clr_99a">1.3</td>
                            <td class="clr_99a">50</td>
                            <td class="clr_99a">50</td>
                            <td class="clr_99a">50</td>
                        </tr>
                        <tr>
                            <td>Campaign 02</td>
                            <td>$100<p>Daily</p>
                            </td>
                            <td class="elegible">Elegible</td>
                            <td class="clr_99a">255</td>
                            <td class="clr_99a">2158</td>
                            <td class="clr_99a">11.11%</td>
                            <td class="clr_99a">$6.27</td>
                            <td class="clr_99a">$21597.00</td>
                            <td class="clr_99a">1.3</td>
                            <td class="clr_99a">50</td>
                            <td class="clr_99a">50</td>
                            <td class="clr_99a">50</td>
                        </tr>
                        <tr>
                            <td>Total All Compaign</td>
                            <td>$200<p>Daily</p>
                            </td>
                            <td></td>
                            <td>510</td>
                            <td>4316</td>
                            <td>22.22%</td>
                            <td>$12.54</td>
                            <td>$43194.00</td>
                            <td>2.6</td>
                            <td>67</td>
                            <td>67</td>
                            <td>67</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="tabs_3 ui-tabs-panel ui-corner-bottom ui-widget-content" id="tabs-3" aria-labelledby="ui-id-3"
        role="tabpanel" aria-hidden="true" style="display: none;">
        <div class="col-md-9 col-sm-12 col-xs-12">
            <div class="opportunities">
                <div class="ads_img">
                    <img src="/public/ModernCamp_files/customer.png" alt="">
                </div>
                <div class="ads_details">
                    <h5>Add new keywords to get your ads in front of more Potential Customers.</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque feugiat
                        facilisis ex, eu vehicula ipsum. Aliquam odio sapien, molestie vel augue sed,
                        lacinia facilisis est. Phasellus a rutrum sem. Morbi vehicula, magna eget
                        finibus hendrerit, felis mi imperdiet velit, vitae imperdiet dolor nunc nec
                        eros.</p>
                </div>
            </div>
            <div class="col-md-12 zero-padding key_editor">
                <p class="editor_title">Add 15 keywords related to <strong>Eiditing</strong></p>
                <div class="clicks">
                    <h2>+2</h2>
                    <p>Weekly Clicks</p>
                </div>
                <div class="impression">
                    <h2>+159</h2>
                    <p>Weekly Clicks</p>
                </div>
                <div class="cost">
                    <h2>+$1.22</h2>
                    <p>Weekly Cost</p>
                </div>
                <div class="view_apply">
                    <a href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/thanks.html"
                        class="comp_btn view">view</a>
                    <a href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/thanks.html"
                        class="comp_btn apply_btn">apply</a>
                </div>
                <p class="btm_para">Keywords include editing firms, editing companies.</p>
            </div>
            <div class="col-md-12 zero-padding key_editor">
                <p class="editor_title">Add 15 keywords related to <strong>Eiditing</strong></p>
                <div class="clicks">
                    <h2>+2</h2>
                    <p>Weekly Clicks</p>
                </div>
                <div class="impression">
                    <h2>+159</h2>
                    <p>Weekly Clicks</p>
                </div>
                <div class="cost">
                    <h2>+$1.22</h2>
                    <p>Weekly Cost</p>
                </div>
                <div class="view_apply">
                    <a href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/thanks.html"
                        class="comp_btn view">view</a>
                    <a href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/thanks.html"
                        class="comp_btn apply_btn">apply</a>
                </div>
                <p class="btm_para">Keywords include editing firms, editing companies.</p>
            </div>
            <div class="col-md-12 zero-padding key_editor last">
                <p class="editor_title">Add 15 keywords related to <strong>Eiditing</strong></p>
                <div class="clicks">
                    <h2>+2</h2>
                    <p>Weekly Clicks</p>
                </div>
                <div class="impression">
                    <h2>+159</h2>
                    <p>Weekly Clicks</p>
                </div>
                <div class="cost">
                    <h2>+$1.22</h2>
                    <p>Weekly Cost</p>
                </div>
                <div class="view_apply">
                    <a href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/thanks.html"
                        class="comp_btn view">view</a>
                    <a href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/thanks.html"
                        class="comp_btn apply_btn">apply</a>
                </div>
                <p class="btm_para">Keywords include editing firms, editing companies.</p>
            </div>
        </div>
    </div>


    <div class="tabs_4 ui-tabs-panel ui-corner-bottom ui-widget-content" id="tabs-4" aria-labelledby="ui-id-4"
        role="tabpanel" aria-hidden="true" style="display: none;">
        <div class="col-md-9 col-sm-12 col-xs-12 zero-padding">
            <div class="col-md-5">
                <div class="report_option">
                    <div class="filter-checkbox">
                        <p>
                            <input type="checkbox" id="c1" name="cb">
                            <label for="c1">Device Trends</label>
                        </p>
                        <p>
                            <input type="checkbox" id="c2" name="cb">
                            <label for="c2">Compaign Performance</label>
                        </p>
                        <p>
                            <input type="checkbox" id="c3" name="cb">
                            <label for="c3">Spend by ad Group</label>
                        </p>
                        <p>
                            <input type="checkbox" id="c4" name="cb">
                            <label for="c4">Keywords Reports for 2018</label>
                        </p>
                        <p>
                            <input type="checkbox" id="c5" name="cb">
                            <label for="c5">Clicks by Devices</label>
                        </p>
                    </div>
                </div>
                <div class="doc_format">
                    <div class="format format_inner">
                        <p class="report_t">Format*</p>
                        <div id="format" class="btn-group dropdown">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <span id="post-format">.CSV</span><span class="fas fa-angle-down"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu10">
                                <li>
                                    <p>.CSV</p>
                                </li>
                                <li>
                                    <p>.PDF</p>
                                </li>
                                <li>
                                    <p>.XPS</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="sender format_inner">
                        <p class="report_t">Send To*</p>
                        <div class="report_option">
                            <div class="filter-checkbox">
                                <p>
                                    <input type="checkbox" id="c6" name="cb">
                                    <label for="c6">Only Me</label>
                                </p>
                                <p>
                                    <input type="checkbox" id="c7" name="cb">
                                    <label for="c7">All account users with access to view
                                        Reports</label>
                                </p>
                                <p>
                                    <input type="checkbox" id="c8" name="cb">
                                    <label for="c8">Specific acoount user and me?</label>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="sender format_inner">
                        <p class="report_t">Frequency*</p>
                        <div id="checking" class="btn-group dropdown">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <span id="post-checking"><span class="purple"></span>Select
                                    Frequency<span class="fas fa-angle-down"></span></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu11">
                                <li>
                                    <p>Per Day</p>
                                </li>
                                <li>
                                    <p>weekly</p>
                                </li>
                                <li>
                                    <p>15 Days</p>
                                </li>
                                <li>
                                    <p>Month</p>
                                </li>
                            </ul>
                        </div>
                        <div class="save_changes">
                            <a href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/index.html#"
                                class="comp_btn save">Save</a>
                            <a href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/index.html#"
                                class="comp_btn cancel">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="table-outer report_table">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Date Range</th>
                                <th scope="col">Creation Date</th>
                                <th scope="col">Created by</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" class="time">All Times</th>
                                <th scope="row" class="date">August 15, 2018</th>
                                <th scope="row" class="author">Jhone Dhoe</th>
                            </tr>
                            <tr>
                                <th scope="row" class="time">Last Month</th>
                                <th scope="row" class="date">August 15, 2018</th>
                                <th scope="row" class="author">Rockey</th>
                            </tr>
                            <tr>
                                <th scope="row" class="time">Custom</th>
                                <th scope="row" class="date">August 15, 2018</th>
                                <th scope="row" class="author">Jass Singh</th>
                            </tr>
                            <tr>
                                <th scope="row" class="time">Yesterday</th>
                                <th scope="row" class="date">August 15, 2018</th>
                                <th scope="row" class="author">Rock</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
