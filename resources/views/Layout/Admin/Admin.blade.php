@Extends('Layout.Admin.LayoutAdmin')
@section('content')

    @if(Route::is('admin'))
        @include('Layout.Admin.Dashboard.StatBox')
        @include('Layout.Admin.Dashboard.Sales')
        @include('Layout.Admin.Dashboard.SalesGraph')
        @include('Layout.Admin.Dashboard.Visitors')
        @include('Layout.Admin.Dashboard.Calendar')
    @elseif(Route::is('admin-products'))
        {{-- @include('Layout.Admin.Products.ListProductsAdmin') --}}
    @elseif(Route::is('admin-orders'))
        @include('Layout.Admin.Orders.ListofOrdersAdmin')
    @elseif(Route::is('admin-customers'))
        @include('Layout.Admin.Customers.ListofCustomersAdmin')
    @elseif(Route::is('admin-statistics'))
        @include('Layout.Admin.Customers.Statistics')
    @elseif(Route::is('admin-admins'))
        @include('Layout.Admin.Admins.ListofAdmins')
    @else
        @include('Layout.Admin.Dashboard.StatBox')
        @include('Layout.Admin.Dashboard.Sales')
        @include('Layout.Admin.Dashboard.SalesGraph')
        @include('Layout.Admin.Dashboard.Visitors')
        @include('Layout.Admin.Dashboard.Calendar')
    @endif


@endsection