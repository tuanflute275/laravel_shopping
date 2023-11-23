<?php

namespace App\Http\Controllers\customer;

use App\Helpers\Cart;
use App\Helpers\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product as ModelsProduct;
use App\Http\CommonFunction\CommonFunction;
use App\Http\Requests\Product\AddToCartRequest;

class WishlistController extends Controller
{
    public function index(){
        return view('customer.wishlist.index');
    }

    public function add_to_wishlist($id)
    {
        $product = ModelsProduct::find($id);
        $wishlist = new Wishlist();
        $wishlist->add($product);
        $commonFunction = new CommonFunction();
        return $commonFunction->handleNotifyAndRedirect('success', 'Inserted Data Sucessfully', 'shop.show_Wishlist');
    }

    public function add_to_cart(Wishlist $wishlist,AddToCartRequest $request, $id)
    {
        $product = ModelsProduct::find($id);
        $cart = new Cart();
        $cart->add($product, $request->quantity);
        $wishlist->clear();
        $commonFunction = new CommonFunction();
        return $commonFunction->handleNotifyAndRedirect('success', 'Insert Data Sucessfully', 'shop.show_cart');
    }

    public function delete(Wishlist $wishlist, $id)
    {
        $product = ModelsProduct::find($id);
        $wishlist->delete($product);
        $commonFunction = new CommonFunction();
        return $commonFunction->handleNotifyAndBack('success', 'Deleted Data Sucessfully');
    }

    public function clear(Wishlist $wishlist)
    {
        $wishlist->clear();
        $commonFunction = new CommonFunction();
        return $commonFunction->handleNotifyAndRedirect('success', 'clear All data successfully', 'shop.show_Wishlist');
    }
}
