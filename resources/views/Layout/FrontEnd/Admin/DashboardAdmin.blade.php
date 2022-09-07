@Extends('Layout.FrontEnd.Admin.LayoutAdmin')
@section('content')

    <!-- StatBox Section Begin -->
    @include('Layout.FrontEnd.Admin.Dashboard.StatBox')
    <!-- StatBox Section End -->

    <!-- Sales Section Begin -->
    @include('Layout.FrontEnd.Admin.Dashboard.Sales')
    <!-- Sales Section End -->

    <!-- Direct Chat Begin -->
    @include('Layout.FrontEnd.Admin.Dashboard.DirectChat')
    <!-- Direct Chat End -->

    <!-- To Do List Begin -->
    @include('Layout.FrontEnd.Admin.Dashboard.ToDoList')
    <!-- To Do List End -->

@endsection


@section('content2')

    <!-- SalesGraph Section Begin -->
    @include('Layout.FrontEnd.Admin.Dashboard.SalesGraph')
    <!-- SalesGraph Section End -->

    <!-- Visitors Section Begin -->
    @include('Layout.FrontEnd.Admin.Dashboard.Visitors')
    <!-- Visitors Section End -->

    <!-- Calendar Section Begin -->
    @include('Layout.FrontEnd.Admin.Dashboard.Calendar')
    <!-- Calendar Section End -->

@endsection