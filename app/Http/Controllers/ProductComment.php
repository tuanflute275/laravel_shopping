<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductComment as ModelsProductComment;
use App\Http\CommonFunction\CommonFunction;

class ProductComment extends Controller
{
    public function index()
    {
        $prod_comment = ModelsProductComment::search()->filter()->orderBy('id', 'desc')->paginate(5)->withQueryString();;
        return view('admin.product_comment.index', compact('prod_comment'));
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
        //
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
        ModelsProductComment::find($id)->delete();
        $commonFunction = new CommonFunction();
        return $commonFunction->handleNotifyAndRedirect('success', 'Delete Data Successfully', 'admin.product_comment.index');
    }
}
