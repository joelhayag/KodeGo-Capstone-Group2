@Extends('Layout.Layout')
@section('content')
    <!-- Hero Section Begin -->
    @if (Route::is('shop'))
        @include('Layout.Shop.Products')
    @elseif(Route::is('shopdetails'))
        @include('Layout.Shop.ShopDetails')
    @elseif(Route::is('cart'))
        @include('Layout.Shop.ShoppingCart')
    @elseif(Route::is('favorites'))
        @include('Layout.Shop.Favorites')
    @elseif(Route::is('checkout'))
        @include('Layout.Shop.Checkout')
    @elseif(Route::is('blogs'))
        @include('Layout.Shop.Blogs')
    @elseif(Route::is('blog'))
        @include('Layout.Shop.BlogDetails')
    @elseif(Route::is('contact'))
        @include('Layout.Shop.Contact')
    @elseif(Route::is('orders'))
        @include('Layout.MyAccount.OrderHistory')
    @else
        @include('Layout.Shop.Products')
    @endif
    <!-- Hero Section End -->
@endsection
