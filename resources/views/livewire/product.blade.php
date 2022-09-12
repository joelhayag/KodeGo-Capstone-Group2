<div class="row featured__filter">
    @foreach ($products as $product)
        <div
            class="col-lg-3 col-md-4 col-sm-6 mix {{ str_replace(' ', '_', $product->category($product->product_category_id)->category_name) }} fresh-meat">
            <div class="featured__item">
                <div class="featured__item__pic set-bg" data-setbg="{{ $product->product_thumbnail }}">
                    <ul class="featured__item__pic__hover">
                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                        <li><a type="button" wire:click="addToCart({{ $product->id }})"><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>
                </div>
                <div class="featured__item__text">
                    <h6><a href="shopdetails/{{ $product->id }}">{{ $product->product_name }}</a></h6>
                    <h5>₱ {{ $product->product_price }}</h5>
                </div>
            </div>
        </div>
    @endforeach
</div>
