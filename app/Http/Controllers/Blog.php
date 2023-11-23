<?php

namespace App\Http\Controllers;

use App\Models\Blog as ModelsBlog;
use Illuminate\Http\Request;
use App\Models\Product as ModelsProduct;
use Illuminate\Support\Facades\Auth;
use App\Http\CommonFunction\CommonFunction;
use App\Http\Requests\Blog\BlogStoreRequest;
use App\Http\Requests\Blog\BlogUpdateRequest;

class Blog extends Controller
{
    public function index()
    {
        $blogs = ModelsBlog::search()->filter()->orderBy('id', 'desc')->paginate(5)->withQueryString();
        return view('admin.blog.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blog.create');
    }


    public function store(BlogStoreRequest $request)
    {
        $user_id =  Auth::check() ? Auth::user()->id : '0';
        $file_name = time() . $request->image->getClientOriginalName();
        $request->image->move(public_path('uploads/blogs'), $file_name);
        $subtitle = $request->sub_title ? $request->sub_title : '';

        ModelsBlog::create([
            'user_id' => $user_id,
            'image' => $file_name,
            'title' => $request->title,
            'subtitle' => $subtitle,
            'content' => $request->content,
        ]);

        $commonFunction = new CommonFunction();
        return $commonFunction->handleNotifyAndRedirect('success', 'Insert Data Successfully', 'admin.blog.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $blog = ModelsBlog::find($id);
        return view('admin.blog.edit', compact('blog'));
    }


    public function update(BlogUpdateRequest $request, $id)
    {
        $user_id =  Auth::check() ? Auth::user()->id : '0';
        $blog = ModelsBlog::find($id);
        $file_name = $blog->image;
        $subtitle = $request->sub_title ? $request->sub_title : '';

        if ($request->has('image')) {
            $file_name = time() . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/blogs'), $file_name);
        } else {
            $file_name = $blog->image;
        }


        ModelsBlog::find($id)->update([
            'user_id' => $user_id,
            'image' => $file_name,
            'title' => $request->title,
            'subtitle' => $subtitle,
            'content' => $request->content,
        ]);

        $commonFunction = new CommonFunction();
        return $commonFunction->handleNotifyAndRedirect('success', 'Update Data Successfully', 'admin.blog.index');
    }

    public function destroy($id)
    {
        ModelsBlog::find($id)->delete();
        $commonFunction = new CommonFunction();
        return $commonFunction->handleNotifyAndRedirect('success', 'Delete Data Successfully', 'admin.blog.index');
    }
}
