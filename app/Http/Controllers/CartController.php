<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    //
    public function addToCart($id, $quantity)
    {
        $product = Product::find($id);

        $cart = session('cart');

        if (!$cart) {
            $cart = [
                $id => [
                    "name" => $product->product_name,
                    "quantity" => $quantity,
                    "price" => $product->product_price,
                    "photo" => $product->product_thumbnail
                ]
            ];
            session(['cart' => $cart]);
            return redirect()->back()->with('success', $quantity . ' ' . $cart[$id]['name'] . ' added to cart');
        }

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = (int)$cart[$id]['quantity'] + $quantity;
            session(['cart' => $cart]);
        } else {
            $cart[$id] = [
                "name" => $product->product_name,
                "quantity" => $quantity,
                "price" => $product->product_price,
                "photo" => $product->product_thumbnail
            ];
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', $quantity . ' ' . $cart[$id]['name'] . ' added to cart');
    }

    public function delete($id)
    {
        $cart = session('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->back();
    }
}
