@extends('layouts.modern-camp-layout')

@section('content')
    <div class="col-md-12 col-sm-6 col-xs-12 graph_details">
        <h4>Statistics</h4>
    </div>

    <div class="col-md-12 table-section">
        {{-- <div class="table-outer"> --}}
        <table class="table">
            <thead class="thead-dark">
                <tr>

                    <th scope="col">
                        <h6 class="first stat-title">
                            Active Ads
                        </h6>
                        <p class="stat-text">
                            {{ $ActiveAd ?? 0 }}
                        </p>
                    </th>

                    <th scope="col">
                        <h6 class="second stat-title">
                            Impressions
                        </h6>
                        <p class="stat-text">
                            {{ $Impressions ?? 0 }}
                        </p>
                    </th>

                    <th scope="col">
                        <h6 class="third stat-title">
                            Clicks
                        </h6>
                        <p class="stat-text">
                            {{ $Clicks ?? 0 }}
                        </p>
                    </th>

                    <th scope="col">
                        <h6 class="fourth stat-title">
                            Leads
                        </h6>
                        <p class="stat-text">
                            {{ $Leads ?? 0 }}
                        </p>
                    </th>

                </tr>
            </thead>
        </table>
        {{-- </div> --}}
    </div>
@endsection
