<section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
                @if ($categories)
                    @foreach ($categories as $category)
                        <div class="col-lg-3">
                            <div class="categories__item set-bg" data-setbg="{{ $category->category_img_url }}">
                                <h5><a href="{{ route('shop') }}">{{ $category->category_name }}</a></h5>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/cat-1.jpg">
                            <h5><a href="#">Fresh Fruit</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/cat-2.jpg">
                            <h5><a href="#">Dried Fruit</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/cat-3.jpg">
                            <h5><a href="#">Vegetables</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/cat-4.jpg">
                            <h5><a href="#">drink fruits</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/cat-5.jpg">
                            <h5><a href="#">drink fruits</a></h5>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
