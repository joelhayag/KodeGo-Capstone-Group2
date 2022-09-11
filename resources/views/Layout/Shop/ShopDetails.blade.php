<section class="breadcrumb-section set-bg" data-setbg="/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>{{ $product ? $product->product_name : 'Product name' }}</h2>
                    <div class="breadcrumb__option">
                        <a href="{{ route('home') }}">Home</a>
                        @if ($product)
                            <a
                                href="{{ url('shopdetails/' . $product->id) }}">{{ $product ? $product->department($product->product_department_id)->department_name : 'department' }}</a>
                        @endif
                        <span>{{ $product ? $product->product_name : 'Product name' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large"
                            src="/{{ $product ? $product->product_thumbnail : '' }}" alt="">
                    </div>
                    <div class="product__details__pic__slider owl-carousel">
                        @if ($product)
                            @foreach ($product->images as $image)
                                <img data-imgbigurl="/{{ $image->image_url }}" src="/{{ $image->image_url }}"
                                    alt="">
                            @endforeach
                        @else
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h3>{{ $product ? $product->product_name : 'Product Name' }}</h3>
                    <div class="product__details__rating">
                        @php
                            $rating = $product ? $product->rating() : 0;
                        @endphp
                        @for ($i = 0; $i < 5; $i++)
                            @if ($i < $rating)
                                <span class=""><i class="text-warning fa fa-star"></i></span>
                            @else
                                <span class=""><i class="fa fa-star" style="color: gray"></i></span>
                            @endif
                        @endfor
                        <span>({{ $product ? count($product->reviews) : 0 }} reviews)</span>
                    </div>
                    <div class="product__details__price">₱ {{ $product ? $product->product_price : '0' }}</div>
                    <p>{{ $product ? $product->product_desc : 'Product description' }}</p>
                    <div class="product__details__quantity">
                        <div class="quantity">
                            <div class="pro-qty">
                                <input type="text" value="1">
                            </div>
                        </div>
                    </div>
                    <a href="#" class="primary-btn">ADD TO CARD</a>
                    <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                    <ul>
                        <li><b>In Stock</b> <span>{{ $product ? $product->product_quantity : 0 }}</span></li>
                        <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                        <li><b>Weight</b> <span>{{ $product ? $product->product_weight : 0 }} kg</span></li>
                        <li><b>Share on</b>
                            <div class="share">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                aria-selected="false">Reviews
                                <span>({{ $product ? count($product->reviews) : 0 }})</span></a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Products Infomation</h6>
                                <p>{{ $product ? $product->product_desc : 'Product description' }}</p>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <div class="d-flex">
                                    <h6>Products Reviews</h6>
                                    <span class="ml-auto"> <a href="#" class="primary-btn" class="btn btn-primary"
                                            data-toggle="modal" data-target="#exampleModal">Add review</a></span>
                                </div>
                                @if ($product)
                                    @foreach ($product->reviews->reverse() as $review)
                                        <div class="card mb-2" style="position: relative">
                                            @if ($review->customer_id == 1)
                                                <span class=""
                                                    style="position: absolute; right: 0; margin-right: 7px; cursor: pointer">
                                                    <form action="{{ route('deleteReview') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" value="{{ $review->id }}"
                                                            name="review_id">
                                                        <button type="submit"
                                                            style="color: red; border: none; background-color: transparent">✖</button>
                                                    </form>
                                                </span>
                                            @endif
                                            <div class="card-body">
                                                <div class="row d-flex">
                                                    <div class="col-1">
                                                        <img src="https://image.ibb.co/jw55Ex/def_face.jpg"
                                                            class="img img-rounded" />
                                                    </div>
                                                    <div class="col">
                                                        <p>
                                                            <span
                                                                class="float-left"><strong>{{ $review->customer->first_name . ' ' . $review->customer->last_name }}</strong></span>
                                                            <span class="text-secondary">&nbsp;
                                                                {{ $review->updated_at->diffForHumans() }}</span></span>
                                                            @for ($i = 5; $i > 0; $i--)
                                                                @if ($i > $review->rating)
                                                                    <span class="float-right"><i
                                                                            class="fa fa-star"></i></span>
                                                                @else
                                                                    <span class="float-right"><i
                                                                            class="text-warning fa fa-star"></i></span>
                                                                @endif
                                                            @endfor

                                                        </p>
                                                        <div class="clearfix"></div>
                                                        <p>{{ $review->review }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                    @if (count($product->reviews) < 1)
                                        <p>No reviews</p>
                                    @endif
                                @else
                                    <p>No reviews</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('Layout.Shop.Modal.AddReview')

<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2>Related Product</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @if ($product)
                @foreach ($product->related_products($product->product_category_id) as $product_)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="/{{ $product_->product_thumbnail }}">
                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="{{ $product_->id }}">{{ $product_->product_name }}</a></h6>
                                <h5>{{ $product_->product_price }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-1.jpg">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-2.jpg">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-3.jpg">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-7.jpg">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
