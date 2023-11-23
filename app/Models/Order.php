<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    }
    public function scopeSearch($query)
    {
        if (request()->keyword) {
            $keyword = request()->keyword;
            $query = $query->where('full_name', 'LIKE', '%' . $keyword . '%');
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
