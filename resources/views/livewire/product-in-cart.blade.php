<tbody wire:poll.750ms>
    @if (count($products) < 1)
        <tr>
            <td colspan='5'>
                Currently no product/s found. Add some
            </td>
        </tr>
    @endif

    @foreach ($products as $key => $product)
        <tr>
            <td class="shoping__cart__item">
                <img src="/{{ $product['photo'] }}" alt="" style="height: 70px">
                <h5>{{ $product['name'] }}</h5>
            </td>
            <td class="shoping__cart__price">
                ₱ {{ $product['price'] }}
            </td>
            <td class="shoping__cart__quantity">
                <div class="quantity">
                    <button style="border:none; padding: 3px 10px"
                        wire:click="updateCart({{ $key }}, 'minus')">-</button>
                    <button
                        style="border:none; padding: 3px 10px; background-color: transparent">{{ $product['quantity'] }}</button>
                    <button style="border:none; padding: 3px 10px"
                        wire:click="updateCart({{ $key }}, 'add')">+</button>
                </div>
            </td>
            <td class="shoping__cart__total">
                @if ($sale)
                    ₱ {{ ($product['price'] - ($product['price'] * ($sale->sale_percentage / 100))) * $product['quantity'] }}
                @else
                    ₱ {{ $product['price'] * $product['quantity'] }}
                @endif
            </td>
            <td class="shoping__cart__item__close">
                <span class="icon_close" wire:click="deleteItemInCart({{ $key }})"></span>
            </td>
        </tr>
    @endforeach
</tbody>
