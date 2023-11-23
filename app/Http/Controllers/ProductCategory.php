<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\CategoryStoreRequest;
use Illuminate\Http\Request;
use App\Models\ProductCategory as Category;
use App\Http\CommonFunction\CommonFunction;

class ProductCategory extends Controller
{
    public function index()
    {
        $categories = Category::search()->filter()->orderBy('id', 'desc')->paginate(5)->withQueryString();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }


    public function store(CategoryStoreRequest $request)
    {
        $form_data = $request->all('name');
        $commonFunction = new CommonFunction();

        try {
            Category::create($form_data);
            return $commonFunction->handleNotifyAndRedirect('success', 'Insert Data Successfully', 'admin.category.index');
        } catch (\Throwable $th) {
            return $commonFunction->handleNotifyAndRedirect('error', 'Insert Data Unsuccessfully', 'admin.category.index');
        }
    }


    public function show($id)
    {
        $category = Category::find($id);
        return $category;
    }


    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }


    public function update(Request $request, Category $category)
    {
        $form_data = $request->all('name');
        $commonFunction = new CommonFunction();

        try {
            $category->update($form_data);
            return $commonFunction->handleNotifyAndRedirect('success', 'Update Data Successfully', 'admin.category.index');
        } catch (\Throwable $th) {
            return $commonFunction->handleNotifyAndRedirect('error', 'Update Data Unsuccessfully', 'admin.category.index');
        }
    }

    public function destroy(Category $category)
    {
        $commonFunction = new CommonFunction();
        if ($category->products->count() > 0) {
            return $commonFunction->handleNotifyAndRedirect('error', 'Deletion failed, category has products', 'admin.category.index');
        } else {
            try {
                $category->delete();
                return $commonFunction->handleNotifyAndRedirect('success', 'Delete Successfully', 'admin.category.index');
            } catch (\Throwable $th) {
            return $commonFunction->handleNotifyAndRedirect('error', 'Deletion failed', 'admin.category.index');
            }
        }
    }
    public function recycle_bin()
    {
        $categories = Category::onlyTrashed()->paginate(10);
        return view('admin.category.trash', compact('categories'));
    }

    public function restored($id)
    {
        Category::onlyTrashed()->find($id)->restore();
        $commonFunction = new CommonFunction();
        return $commonFunction->handleNotifyAndRedirect('success', 'Restored Successfully', 'admin.category.recycle_bin');
    }
    public function force_delete($id)
    {
        Category::onlyTrashed()->find($id)->forceDelete();
        $commonFunction = new CommonFunction();
        return $commonFunction->handleNotifyAndRedirect('success', 'Delete Successfully', 'admin.category.index');
    }
}
