@extends('layouts.modern-camp-layout')

@section('content')
    <div class="ui-tabs-panel ui-corner-bottom ui-widget-content" role="tabpanel" aria-hidden="false">

        <div class="col-md-9 col-sm-12 zero-padding">

            <div class="col-md-12 col-sm-6 col-xs-12 graph_details">
                <h4>Statistics</h4>
            </div>

            <div class="col-md-12 table-section">
                <div class="table-outer">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>

                                <th scope="col">
                                    <h6 class="first">
                                        Active Ads
                                    </h6>
                                    <p>
                                        {{ $ActiveAd ?? 0 }}
                                    </p>
                                </th>

                                <th scope="col">
                                    <h6 class="second">
                                        Impressions

                                    </h6>
                                    <p>
                                        {{ $Impressions ?? 0 }}
                                    </p>
                                </th>

                                <th scope="col">
                                    <h6 class="third">
                                        Clicks
                                    </h6>
                                    <p>
                                        {{ $Clicks ?? 0 }}
                                    </p>
                                </th>

                                <th scope="col">
                                    <h6 class="fourth">
                                        Leads
                                    </h6>
                                    <p>
                                        {{ $Leads ?? 0 }}
                                    </p>
                                </th>

                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

        </div>

    </div>
@endsection
