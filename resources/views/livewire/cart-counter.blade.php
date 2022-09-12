<div class="header__cart" wire:poll.750ms>
    <ul>
        <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
        <li><a href="{{ route('cart') }}"><i class="fa fa-shopping-bag"></i> <span>{{ $count }}</span></a></li>
    </ul>
    <div class="header__cart__price">item: <span>₱ {{ $total }}</span></div>
</div>
