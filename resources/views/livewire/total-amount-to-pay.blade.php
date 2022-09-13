<div class="row" wire:poll.100ms>
    <div class="col-lg-12">
        <div class="shoping__cart__btns">
            <a href="{{ route('shop') }}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="shoping__continue">
            <div class="shoping__discount">
                <h5>Discount Codes</h5>
                <form>
                    <input type="text" placeholder="Enter your coupon code" wire:model.debounce.0ms="coupon_code">
                    @if ($amount['subtotal'] > 1)
                        <button type="button" class="site-btn" wire:click="applyForCoupon">APPLY COUPON</button>
                    @endif
                </form>
                @if ($amount['message'] != '')
                    <div class="alert alert-danger mt-3" role="alert">
                        {{ $amount['message'] }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="shoping__checkout">
            <h5>Cart Total</h5>
            <ul>
                <li>Subtotal <span>₱ {{ $amount['subtotal'] }}</span></li>
                <li>Sale Discount <span>₱ -{{ $amount['sale_discount'] }}</span></li>
                <li>Coupon Discount <span>₱ -{{ $amount['coupon_discount'] }}</span></li>
                <li>Total <span>₱ {{ $amount['total'] }}</span></li>
            </ul>
            @if ($amount['subtotal'] > 1)
                <a href="{{ route('checkout') }}" class="primary-btn">PROCEED TO CHECKOUT</a>
            @endif
        </div>
    </div>
</div>
