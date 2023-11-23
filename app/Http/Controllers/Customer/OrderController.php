<?php

namespace App\Http\Controllers\customer;

use App\Helpers\Cart;
use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Mail\OrderShipped;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Checkout\CheckoutRequest;
use App\Http\CommonFunction\CommonFunction;

class OrderController extends Controller
{
    public function checkout(Cart $cart)
    {
        $customer = Auth::user();
        return view('customer.checkout.index', compact('cart', 'customer'));
    }

    public function post_checkout(CheckoutRequest $request, Cart $cart)
    {
        $data = [
            'user_id' => Auth::user()->id,
            'full_name' => $request->name,
            'street_address' => $request->street_address,
            'town_city' => $request->city,
            'phone' => $request->phone,
            'email' => $request->email,
            'message' => $request->message,
            'payment_type' => 'Cash on delivery'
        ];

        if ($order = Order::create($data)) {
            foreach ($cart->getCart() as $item) {
                $detail = [
                    'order_id' => $order->id,
                    'user_id' => Auth::user()->id,
                    'product_id' => $item['product_id'],
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                ];
                OrderDetail::create($detail);
            }

            $email = $request->email;
            $name = $request->name;
            Mail::to($email)->send(new OrderShipped($email, $name));
            $cart->clear();

            // notification
            $commonFunction = new CommonFunction();
            return $commonFunction->handleNotifyAndRedirect('success', 'Order Sucessfully', 'order.success');
        }
        $commonFunction = new CommonFunction();
        return $commonFunction->handleNotifyAndBack('error', 'Please Try Again');
    }

    public function order_success()
    {
        return view('customer.checkout.order_success');
    }
}
