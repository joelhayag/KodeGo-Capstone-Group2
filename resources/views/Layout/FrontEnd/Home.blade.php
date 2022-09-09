    @Extends('Layout.Layout')
    @section('content')

        <!-- Categories Section Begin -->
        @include('Layout.FrontEnd.Home.Categories')
        <!-- Categories Section End -->

        <!-- Featured Section Begin -->
        @include('Layout.FrontEnd.Home.FeaturedProducts')
        <!-- Featured Section End -->

        <!-- Banner Begin -->
        @include('Layout.FrontEnd.Home.Banners');
        <!-- Banner End -->

        <!-- Latest Product Section Begin -->
        @include('Layout.FrontEnd.Home.Products')
        <!-- Latest Product Section End -->

        <!-- Blog Section Begin -->
        @include('Layout.FrontEnd.Home.Blogs')
        <!-- Blog Section End -->

    @endsection


