@Extends('Layout.Admin.LayoutAdmin')
@section('content')

    @if(Route::is('admin'))
        @section('title') {{'Dashboard'}} @endsection
        @include('Layout.Admin.Dashboard.PageHeader')
        @include('Layout.Admin.Dashboard.StatBox')
        @include('Layout.Admin.Dashboard.Sales')
        @include('Layout.Admin.Dashboard.SalesGraph')
        @include('Layout.Admin.Dashboard.Visitors')
        @include('Layout.Admin.Dashboard.Calendar')
    @elseif(Route::is('admin-products'))
        @section('title') {{'Products'}} @endsection
        @include('Layout.Admin.Products.ListProductsAdmin')
    @elseif(Route::is('admin-orders'))
        @section('title') {{'Orders'}} @endsection
        @include('Layout.Admin.Orders.ListofOrdersAdmin')
    @elseif(Route::is('admin-customers'))
        @section('title') {{'Customers'}} @endsection
        @include('Layout.Admin.Customers.ListofCustomersAdmin')
    @elseif(Route::is('admin-statistics'))
        @section('title') {{'Statistics'}} @endsection
        {{-- @include('Layout.Admin.Customers.Statistics') --}}

    @elseif(Route::is('admin-admins'))
        @section('title') {{'Admins'}} @endsection
        @include('Layout.Admin.Admins.ListofAdmins')
    @elseif(Route::is('admin-settings'))
        @section('title') {{'Settings'}} @endsection
        @include('Layout.Admin.Admins.ListofAdmins')
    @else
        @include('Layout.Admin.Dashboard.StatBox')
        @include('Layout.Admin.Dashboard.Sales')
        @include('Layout.Admin.Dashboard.SalesGraph')
        @include('Layout.Admin.Dashboard.Visitors')
        @include('Layout.Admin.Dashboard.Calendar')
    @endif


@endsection