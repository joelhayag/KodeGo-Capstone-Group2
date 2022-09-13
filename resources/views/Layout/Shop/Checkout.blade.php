<section class="breadcrumb-section set-bg" data-setbg="/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Checkout</h2>
                    <div class="breadcrumb__option">
                        <a href="{{ route('home') }}">Home</a>
                        <span>Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <h4>Billing Details</h4>
            @if ($error)
                <div class="alert alert-warning" role="alert">
                    This is a warning alert—check it out!
                </div>
            @endif
            <form action="{{ route('proceedCheckout') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Fist Name<span>*</span></p>
                                    <input type="text" name="fname" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Last Name<span>*</span></p>
                                    <input type="text" name="lname" required>
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Country<span>*</span></p>
                            <input type="text" name="country" required>
                        </div>
                        <div class="checkout__input">
                            <p>Address<span>*</span></p>
                            <input type="text" placeholder="Street Address" class="checkout__input__add"
                                name="street" required>
                            <input type="text" placeholder="Apartment, suite, unite ect (optinal)" name="appartment">
                        </div>
                        <div class="checkout__input">
                            <p>Town/City<span>*</span></p>
                            <input type="text" name="city" required>
                        </div>
                        <div class="checkout__input">
                            <p>Country/State<span>*</span></p>
                            <input type="text" name="state" required>
                        </div>
                        <div class="checkout__input">
                            <p>Postcode / ZIP<span>*</span></p>
                            <input type="text" name="code" required>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Phone<span>*</span></p>
                                    <input type="text" name="phone" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="text" name="email" required>
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input__checkbox">
                            <label for="acc">
                                Create an account?
                                <input type="checkbox" id="acc" name="isCreate">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <p>Create an account by entering the information below. If you are a returning customer
                            please login at the top of the page</p>
                        <div class="checkout__input">
                            <p>Account Password<span>*</span></p>
                            <input type="text" name="password" required>
                        </div>
                        <div class="checkout__input">
                            <p>Order notes<span></span></p>
                            <input type="text" placeholder="Notes about your order, e.g. special notes for delivery."
                                name="other">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Your Order</h4>
                            <div class="checkout__order__products">Products <span>Total</span></div>
                            <ul>
                                @foreach ((array) $products as $product)
                                    <li>{{ $product['name'] }} <span>{{ $product['price'] }}</span></li>
                                @endforeach
                            </ul>
                            <div class="checkout__order__subtotal">Subtotal <span>₱
                                    {{ $amount['sale_discount'] + $amount['total'] }}</span></div>
                            <div class="checkout__order__subtotal" style="border-top: none; margin-top: -10px">Coupon
                                discount <span>₱ {{ $amount['coupon_discount'] }}</span></div>
                            <div class="checkout__order__total">Total <span>₱ {{ $amount['total'] }}</span></div>
                            <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua.</p>
                            <div class="checkout__input__checkbox">
                                <label for="payment">
                                    Check Payment
                                    <input type="checkbox" id="payment">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="paypal">
                                    Paypal
                                    <input type="checkbox" id="paypal">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <button type="submit" class="site-btn">PLACE ORDER</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
