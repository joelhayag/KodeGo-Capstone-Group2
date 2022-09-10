@Extends('Layout.Layout')
@section('content')

    <!-- Categories Section Begin -->
    @include('Layout.Home.Categories')
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    @include('Layout.Home.FeaturedProducts')
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    @include('Layout.Home.Banners');
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    @include('Layout.Home.Products')
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    @include('Layout.Home.Blogs')
    <!-- Blog Section End -->

@endsection


