<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    //thanh toán đơn hàng
    public function checkout(Request $request)
    {
        $request->validate([
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'payment' => 'required',
        ]);

        $cart = session()->get('cart', []);
        //Tính tổng giá đơn hàng
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        //Lưu đơn hàng vào DB
        $order = new Order();
        $order->user_id = Auth::id();
        $order->address = $request->input('address');
        $order->phone = $request->input('phone');
        $order->email = $request->input('email');
        $order->status = 0; // Đơn hàng mới
        $order->payment = $request->input('payment');
        $order->total = $total;
        $order->note = $request->input('note');
        $order->pay_amount = $total; // Số tiền đã thanh toán chưa tính sale

        //Lưu mã giảm giá nếu có
        // if ($request->has('voucher_code')) {
        //     $order->voucher_code = $request->input('voucher_code');
        // }
        //Lưu ghi chú nếu có
        if ($request->has('note')) {
            $order->note = $request->input('note');
        }
        //Lưu số tiền đã thanh toán
        // if ($request->has('pay_amount')) {
        //     $order->pay_amount = $request->input('pay_amount');
        // }


        if ($order->save()) {
            //Lưu thông tin chi tiết đơn hàng
            foreach ($cart as $item) {
                OrderDetail::query()->create(
                    [
                        'order_id' => $order->id,
                        'product_variant_id' => $item['id'],
                        'quantity' => $item['quantity'],
                        'price' => $item['price'],
                    ]
                );
            }
            session()->forget('cart'); // Xóa giỏ hàng sau khi thanh toán thành công
            return redirect()->route('home')->with('success', 'Đặt hàng thành công!');
        } else {
            return redirect()->back()->with('error', 'Đặt hàng thất bại!');
        }
    }
}
