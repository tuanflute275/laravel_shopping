<?php

namespace App\Http\Controllers;

use App\Models\Order as ModelsOrder;
use Illuminate\Http\Request;

class Order extends Controller
{
    public function index()
    {
        $orders = ModelsOrder::search()->filter()->orderBy('id', 'desc')->paginate(3)->withQueryString();
        return view('admin.order.index', compact('orders'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $order = ModelsOrder::find($id);
        return view('admin.order.detail', compact('order'));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
