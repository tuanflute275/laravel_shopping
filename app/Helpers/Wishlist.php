<?php

namespace App\Helpers;

use App\Models\Product;

class Wishlist
{
    private $items = [];

    public function __construct()
    {
        $this->items = session('wishlist') ? session('wishlist') : [];
    }

    public function add($product)
    {
        try {
            $item = [
                'product_id' => $product->id,
                'name' => $product->name,
                'image' => $product->image,
                'price' => $product->discount ? $product->discount : $product->price,
            ];

            $this->items[$product->id] = $item;

            session(['wishlist' => $this->items]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }


    public function delete($product)
    {
        if ($this->items[$product->id]) {
            unset($this->items[$product->id]);
        }
        session(['wishlist' => $this->items]);
    }

    public function getWishlist()
    {
        return $this->items;
    }

    public function clear()
    {
        session(['wishlist' => null]);
    }

}
