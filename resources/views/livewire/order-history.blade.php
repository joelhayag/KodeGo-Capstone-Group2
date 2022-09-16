<tbody wire:poll.750ms>
    @if ($products)
        @if (count($products) < 1)
            <tr>
                <td colspan='5'>
                    Currently no product/s found.
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
                    @if ($sale)
                        ₱
                        {{ ($product['price'] - $product['price'] * ($sale->sale_percentage / 100)) * $product['quantity'] }}
                    @else
                        ₱ {{ $product['price'] * $product['quantity'] }}
                    @endif
                </td>
                <td class="shoping__cart__quantity">
                    <div class="quantity">
                        <button
                            style="border:none; padding: 3px 10px; background-color: transparent">{{ $product['quantity'] }}</button>
                    </div>
                </td>
                <td class="shoping__cart__total">
                    @if ($product['status'] == 'received')
                        <span class="badge text-bg-light p-2">{{ $product['status'] }}</span>
                    @elseif ($product['status'] == 'preparing')
                        <span class="badge text-bg-secondary p-2">{{ $product['status'] }}</span>
                    @elseif ($product['status'] == 'on the way')
                        <span class="badge text-bg-warning p-2">{{ $product['status'] }}</span>
                    @elseif ($product['status'] == 'delivered')
                        <span class="badge text-bg-success p-2">{{ $product['status'] }}</span>
                    @endif
                </td>
            </tr>
        @endforeach
    @endif
</tbody>
