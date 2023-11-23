<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Blog;
use App\Models\Order;
use App\Models\User;

class Dashboard extends Controller
{
    public function index()
    {
        $products = Product::get();
        $orders = Order::get();
        $users = User::get();
        $blogs = Blog::get();
        return view('admin.index', compact('products', 'orders', 'users', 'blogs'));
    }
}
