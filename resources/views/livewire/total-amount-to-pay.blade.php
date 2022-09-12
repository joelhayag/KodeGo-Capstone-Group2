<div class="shoping__checkout" wire:poll.750ms>
    <h5>Cart Total</h5>
    <ul>
        <li>Subtotal <span>₱ {{ $amount['subtotal'] }}</span></li>
        <li>Total <span>₱ {{ $amount['subtotal'] }}</span></li>
    </ul>
    @if ($amount['subtotal'] > 1)
        <a href="#" class="primary-btn">PROCEED TO CHECKOUT</a>
    @endif
</div>
