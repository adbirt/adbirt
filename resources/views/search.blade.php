@extends('layouts.default')

@section('content')
    @include('includes.alert')
    <!-- Content -->
    <div class="layout-content" data-scrollable>
        <div class="container-fluid">
            <div class="clearfix"></div>
            <div class="card-columns">
                @if (count($products) === 0)
                    No products found
                @elseif (count($products) >= 1)
                    @foreach ($products as $product)
                        print product
                    @endforeach
                @endif
            </div>

            <nav class="center">
                {{--  --}}
            </nav>

        </div>
    </div>
@stop
