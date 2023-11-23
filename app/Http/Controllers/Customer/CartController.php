<?php

namespace App\Http\Controllers\customer;

use App\Helpers\Cart;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\AddToCartRequest;
use App\Http\Requests\Product\UpdateCartRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\CommonFunction\CommonFunction;

class CartController extends Controller
{
    public function index(Cart $cart){
        $carts_view = $cart->getCart();
        $totalPrice = $cart->getTotalPrice();
        return view('customer.cart.index', compact('carts_view', 'totalPrice'));
    }
    public function add_to_cart(AddToCartRequest $request, $id)
    {
        $product = Product::find($id);
        $cart = new Cart();
        $cart->add($product, $request->quantity);
        $commonFunction = new CommonFunction();
        return $commonFunction->handleNotifyAndRedirect('success', 'Insert Data Sucessfully', 'shop.show_cart');
    }

    public function update_cart(UpdateCartRequest $req, Cart $cart, $id)
    {
        $product = Product::find($id);
        $cart->update($req->quantity, $product);
        $commonFunction = new CommonFunction();
        return $commonFunction->handleNotifyAndBack('success', 'Update Data Sucessfully');
    }

    public function delete(Cart $cart, $id)
    {
        $product = Product::find($id);
        $cart->delete($product);
        $commonFunction = new CommonFunction();
        return $commonFunction->handleNotifyAndBack('success', 'Delete Data Sucessfully');
    }

    public function clear(Cart $cart)
    {
        $cart->clear();
        $commonFunction = new CommonFunction();
        return $commonFunction->handleNotifyAndRedirect('success', 'Clear All Data Sucessfully', 'shop.show_cart');
    }
}
