<?php

namespace App\Http\Controllers;

use App\Models\ProductVariant;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $variant_id = $request->input('variant_id');
        $quantity = $request->input('quantity', 1);
        $variant = ProductVariant::with(['product', 'color', 'size'])
            ->find($variant_id);

        $cart = session()->get('cart', []) ?? [];
        if (isset($cart[$variant_id])) {
            $cart[$variant_id]['quantity'] += $quantity;
        } else {
            $cart[$variant_id] = [
                'id' => $variant->id,
                'name' => $variant->product->name,
                'color' => $variant->color->name,
                'size' => $variant->size->name,
                'price' => $variant->price,
                'quantity' => $quantity,
            ];
        }
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Thêm vào giỏ hàng thành công!');
    }

    //Hiển thị giỏ hàng
    public function showCart()
    {
        $cart = session()->get('cart', []);

        //Tính tổng giá đơn hàng
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        // dd($cart);
        return view('carts.index', compact('cart', 'total'));
    }

    //Hiển thị form checkout
    public function showCheckOut()
    {
        $cart = session()->get('cart', []);
        //Tính tổng giá đơn hàng
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return view('carts.checkout', compact('cart', 'total'));
    }
}
