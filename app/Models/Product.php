<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id', 'id');
    }
    public function productImages()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }
    public function productDetails()
    {
        return $this->hasMany(ProductDetail::class, 'product_id', 'id');
    }
    public function productComments()
    {
        return $this->hasMany(ProductComment::class, 'product_id', 'id');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'product_id', 'id');
    }

    public function scopeSearch($query)
    {
        if (request()->keyword) {
            $keyword = request()->keyword;
            $query = $query->where('name', 'LIKE', '%' . $keyword . '%');
        }
        return $query;
    }

    public function scopeFilter($query)
    {
        if (request()->order) {
            $order = request()->order;
            if($order == 'none'){
                $query = $query;
            }else{
                $order_arr = explode('-', $order);
                $query = $query->orderBy($order_arr[0], $order_arr[1]);
            }
        }
        return $query;
    }

    public function getProductByCategory($categoryName, $request){
        $products = ProductCategory::where($categoryName)->first()->products->toQuery();
    }
    public function getProductByBrand($brandName, $request){
        $products = Brand::where($brandName)->first()->products->toQuery();
    }
}
