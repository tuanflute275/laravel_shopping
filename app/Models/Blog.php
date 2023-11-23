<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function blogComments()
    {
        return $this->hasMany(BlogComment::class, 'blog_id', 'id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function scopeSearch($query)
    {
        if (request()->keyword) {
            $keyword = request()->keyword;
            $query = $query->where('title', 'LIKE', '%' . $keyword . '%');
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
