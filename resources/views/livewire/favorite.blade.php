<div class="row">
    @if ($products)
        @foreach ($products as $product)
            <div class="col-lg-3 col-md-3 col-sm-4 mb-2">
                <div class="product__discount__item">
                    <div class="product__discount__item__pic set-bg"
                        data-setbg="{{ asset($product->product_thumbnail) }}">
                        @if ($sale)
                            <div class="product__discount__percent">-{{ $sale->sale_percentage }}%</div>
                        @endif
                        <ul class="product__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a type="button" wire:click="addToCart({{ $product->id }})"><i
                                        class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="product__discount__item__text">
                        <h5><a href="{{ url('shopdetails/' . $product->id) }}">{{ $product->product_name }}</a></h5>

                        @if ($sale)
                            <div class="product__item__price">₱
                                {{ $product->product_price - $product->product_price * ($sale->sale_percentage / 100) }}
                                <span>₱ {{ $product->product_price }}</span>
                            </div>
                        @else
                            <div class="product__item__price">₱ {{ $product->product_price }} </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class='col text-center'><h4>No found product/s</h4></div>
    @endif
</div>
