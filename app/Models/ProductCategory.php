<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name'];
    protected $table = 'product_categories';
    protected $primaryKey = 'id';
    protected $guarded = [];
    public function products()
    {
        return $this->hasMany(Product::class, 'product_category_id', 'id');
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


}
