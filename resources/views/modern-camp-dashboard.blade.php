@extends('layouts.modern-camp-layout')

@section('content')

    <div class="tabs_1 ui-tabs-panel ui-corner-bottom ui-widget-content" id="tabs-1" aria-labelledby="ui-id-1"
        role="tabpanel" aria-hidden="false">
        
        {{-- <div class="col-md-9 col-sm-12 col-xs-12 zero-padding filter-sec">
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
        </div> --}}

        {{-- <div class="custom-selection">
            <div class="col-md-3 col-sm-6 col-xs-12 margin_btm">
                <div id="post" class="btn-group dropdown">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span>Account : <span id="selected-post" style="color:var(--theme-color)">John
                                Doe</span></span> <span class="fas fa-angle-down"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu1">
                        <li>
                            <p><span style="color:var(--theme-color)">John Doe 1</span></p>
                        </li>
                        <li>
                            <p><span style="color:var(--theme-color)">John Doe 2</span></p>
                        </li>
                        <li>
                            <p><span style="color:var(--theme-color)">John Doe 3</span></p>
                        </li>
                        <li>
                            <p><span style="color:var(--theme-color)">John Doe 4</span></p>
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
                        <span>Range : <span id="selected-range" style="color:var(--theme-color)">Mar 2018, Apr
                                2018</span></span> <span class="fas fa-angle-down"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu3">
                        <li>
                            <p><span style="color:var(--theme-color)">Apr 2020, May 2020</span></p>
                        </li>
                        <li>
                            <p><span style="color:var(--theme-color)">May 2020, Jun 2020</span></p>
                        </li>
                        <li>
                            <p><span style="color:var(--theme-color)">Jun 2020, Jul 2020</span></p>
                        </li>
                        <li>
                            <p><span style="color:var(--theme-color)">Jul 2020, Aug 2020</span></p>
                        </li>
                    </ul>
                </div>
            </div>
        </div> --}}

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

@endsection
