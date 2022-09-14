@Extends('Layout.Admin.LayoutAdmin')
@section('content')

    @if(Route::is('admin'))
        @include('Layout.Admin.Dashboard.StatBox')
        @include('Layout.Admin.Dashboard.Sales')
        @include('Layout.Admin.Dashboard.SalesGraph')
        @include('Layout.Admin.Dashboard.Visitors')
        @include('Layout.Admin.Dashboard.Calendar')
    @elseif(Route::is('product'))
    @else
    @endif

    
@endsection