<div>
    <div class="product__details__quantity">
        <div class="quantity">
            <button style="border:none; padding: 10px 17px" wire:click="decrement">-</button>
            <button style="border:none; padding: 10px 17px; background-color: transparent">{{ $count }}</button>
            <button style="border:none; padding: 10px 17px" wire:click="increment">+</button>
        </div>
    </div>
    <a type="button" class="primary-btn text-light" wire:click="addToCart">ADD TO CARD</a>
    <a type="button" wire:click="addToFavorite({{ $product->id }})"><span class="icon_heart_alt"></span></a>
</div>
