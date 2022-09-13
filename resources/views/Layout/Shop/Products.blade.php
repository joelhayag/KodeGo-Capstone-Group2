<section class="breadcrumb-section set-bg" data-setbg="/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>{{ $settings->app_name }}</h2>
                    <div class="breadcrumb__option">
                        <a href="{{ route('home') }}">Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Department</h4>
                        <ul>
                            @if ($departments)
                                @foreach ($departments as $department)
                                    <li><a href="#">{{ $department->department_name }}</a></li>
                                @endforeach
                            @else
                                <li><a href="#">Fresh Meat</a></li>
                                <li><a href="#">Vegetables</a></li>
                                <li><a href="#">Fruit & Nut Gifts</a></li>
                                <li><a href="#">Fresh Berries</a></li>
                                <li><a href="#">Ocean Foods</a></li>
                                <li><a href="#">Butter & Eggs</a></li>
                                <li><a href="#">Fastfood</a></li>
                                <li><a href="#">Fresh Onion</a></li>
                                <li><a href="#">Papayaya & Crisps</a></li>
                                <li><a href="#">Oatmeal</a></li>
                                <li><a href="#">Fresh Bananas</a></li>
                            @endif
                        </ul>
                    </div>

                    <div class="sidebar__item">
                        <h4>Price</h4>
                        <form action="{{ route('priceRange') }}" method="POST">
                            @csrf
                            <div class="price-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                    data-min="{{ $min }}" data-max="{{ $max }}">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                </div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <input type="text" id="minamount" name="min">
                                        <input type="text" id="maxamount" name="max">
                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="site-btn w-100 my-3" value="Filter">
                        </form>
                    </div>

                    <div class="sidebar__item">
                        <div class="latest-product__text">
                            <h4>Latest Products</h4>
                            <div class="latest-product__slider owl-carousel">

                                <div class="latest-prdouct__slider__item">
                                    @if ($latests)
                                        @php
                                            $count = 0;
                                        @endphp
                                        @foreach ($latests as $product)
                                            @if ($count < 3)
                                                <a href="{{ url('shopdetails/'.$product->id) }}" class="latest-product__item">
                                                    <div class="latest-product__item__pic">
                                                        <img src="/{{ $product->product_thumbnail }}" alt="">
                                                    </div>
                                                    <div class="latest-product__item__text">
                                                        <h6>{{ $product->product_name }}</h6>
                                                        <span>₱ {{ $product->product_price }}</span>
                                                    </div>
                                                </a>
                                            @endif
                                            @php
                                                $count++;
                                            @endphp
                                        @endforeach
                                    @else
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="img/latest-product/lp-1.jpg" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>Crab Pool Security</h6>
                                                <span>$30.00</span>
                                            </div>
                                        </a>
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="img/latest-product/lp-2.jpg" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>Crab Pool Security</h6>
                                                <span>$30.00</span>
                                            </div>
                                        </a>
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="img/latest-product/lp-3.jpg" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>Crab Pool Security</h6>
                                                <span>$30.00</span>
                                            </div>
                                        </a>
                                    @endif
                                </div>
                                <div class="latest-prdouct__slider__item">
                                    @if ($latests)
                                        @php
                                            $count = 0;
                                        @endphp
                                        @foreach ($latests as $product)
                                            @if ($count > 2)
                                                <a href="shopdetails/{{ $product->id }}" class="latest-product__item">
                                                    <div class="latest-product__item__pic">
                                                        <img src="/{{ $product->product_thumbnail }}" alt="">
                                                    </div>
                                                    <div class="latest-product__item__text">
                                                        <h6>{{ $product->product_name }}</h6>
                                                        <span>₱ {{ $product->product_price }}</span>
                                                    </div>
                                                </a>
                                            @endif
                                            @php
                                                $count++;
                                            @endphp
                                        @endforeach
                                    @else
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="img/latest-product/lp-1.jpg" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>Crab Pool Security</h6>
                                                <span>$30.00</span>
                                            </div>
                                        </a>
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="img/latest-product/lp-2.jpg" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>Crab Pool Security</h6>
                                                <span>$30.00</span>
                                            </div>
                                        </a>
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="img/latest-product/lp-3.jpg" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>Crab Pool Security</h6>
                                                <span>$30.00</span>
                                            </div>
                                        </a>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                <div class="filter__item">
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <div class="filter__sort">
                                <span>Sort By</span>
                                <select onchange="location = this.value;">
                                    <option value="{{ route('shop') }}">Default</a></option>
                                    <option value="{{ url('shop/HighToLow') }}">High</option>
                                    <option value="{{ url('shop/LowToHigh') }}">Low</option>
                                    <option value="{{ url('shop/Name') }}">Name</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                @livewire('shop')
                <div class="product__pagination">
                    {{ $products->render() }}
                </div>
            </div>
        </div>
    </div>

</section>
