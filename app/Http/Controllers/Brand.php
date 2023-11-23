<?php

namespace App\Http\Controllers;

use App\Http\Requests\Brand\BrandStoreRequest;
use App\Http\Requests\Brand\BrandUpdateRequest;
use App\Models\Brand as ModelsBrand;
use App\Http\CommonFunction\CommonFunction;

class Brand extends Controller
{
    public function index()
    {
        $brands = ModelsBrand::search()->filter()->orderBy('id', 'desc')->paginate(5)->withQueryString();
        return view('admin.brand.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brand.create');
    }


    public function store(BrandStoreRequest $request)
    {
        $form_data = $request->all('name');
        $commonFunction = new CommonFunction();
        try {
            ModelsBrand::create($form_data);
            return $commonFunction->handleNotifyAndRedirect('success', 'Insert Data Successfully', 'admin.brand.index');
        } catch (\Throwable $th) {
            return $commonFunction->handleNotifyAndRedirect('error', 'Insert Data Unsuccessfully', 'admin.brand.index');
        }
    }


    public function show($id)
    {
        $brand = ModelsBrand::find($id);
        return $brand;
    }


    public function edit($id)
    {
        $brand = ModelsBrand::find($id);
        return view('admin.brand.edit', compact('brand'));
    }


    public function update(BrandUpdateRequest $request, ModelsBrand $brand)
    {
        $form_data = $request->all('name');
        $commonFunction = new CommonFunction();
        try {
            $brand->update($form_data);
            return $commonFunction->handleNotifyAndRedirect('success', 'Update Data Successfully', 'admin.brand.index');
        } catch (\Throwable $th) {
            return $commonFunction->handleNotifyAndRedirect('error', 'Update Data Unsuccessfully', 'admin.brand.index');
        }
    }

    public function destroy(ModelsBrand $brand)
    {
        $commonFunction = new CommonFunction();
        if ($brand->products->count() > 0) {
            return redirect()->route('admin.brand.index')->with('success', 'Deletion failed, category has products');
        } else {
            try {
                $brand->delete();
                return $commonFunction->handleNotifyAndRedirect('success', 'Delete Successfully', 'admin.brand.index');
            } catch (\Throwable $th) {
                return $commonFunction->handleNotifyAndRedirect('error', 'Deletion failed', 'admin.brand.index');
            }
        }
    }

    public function recycle_bin()
    {
        $brands = ModelsBrand::onlyTrashed()->paginate(10);
        return view('admin.brand.trash', compact('brands'));
    }

    public function restored($id)
    {
        $commonFunction = new CommonFunction();
        ModelsBrand::onlyTrashed()->find($id)->restore();
        return $commonFunction->handleNotifyAndRedirect('success', 'Restore Sucessfully', 'admin.brand.index');
    }

    public function force_delete($id)
    {
        $commonFunction = new CommonFunction();
        ModelsBrand::onlyTrashed()->find($id)->forceDelete();
        return $commonFunction->handleNotifyAndRedirect('success', 'Delete Sucessfully', 'admin.brand.recycle_bin');
    }
}
