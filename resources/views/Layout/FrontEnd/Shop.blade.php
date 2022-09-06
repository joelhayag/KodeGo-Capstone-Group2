@Extends('Layout.Layout')
    @section('content')

        <!-- Hero Section Begin -->
        @if(Route::is('shop'))
            @include('Layout.FrontEnd.Shop.Products')
        @elseif(Route::is('shopdetails'))
            @include('Layout.FrontEnd.Shop.ShopDetails')
        @elseif(Route::is('cart'))
            @include('Layout.FrontEnd.Shop.ShoppingCart')
        @elseif(Route::is('checkout'))
            @include('Layout.FrontEnd.Shop.Checkout')
        @elseif(Route::is('blogs'))
            @include('Layout.FrontEnd.Shop.Blogs')
        @elseif(Route::is('blog'))
            @include('Layout.FrontEnd.Shop.BlogDetails')
        @elseif(Route::is('contact'))
            @include('Layout.FrontEnd.Shop.Contact')
        @endif

        <!-- Hero Section End -->

    @endsection


