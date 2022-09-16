<div class="header__cart" wire:poll.750ms>
    <ul>
        <li><a href="{{ route('favorites') }}"><i class="fa fa-heart"></i> <span>{{ $favorite }}</span></a></li>
        <li><a href="{{ route('cart') }}"><i class="fa fa-shopping-bag"></i> <span>{{ $count }}</span></a></li>
    </ul>
    <div class="header__cart__price">item: <span>₱ {{ $total }}</span></div>
</div>
