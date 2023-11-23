<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    use HasFactory;
    protected $table = 'blog_comments';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id', 'id');
    }

    public function scopeSearch($query)
    {
        if (request()->keyword) {
            $keyword = request()->keyword;
            $query = $query->where('messages', 'LIKE', '%' . $keyword . '%');
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
