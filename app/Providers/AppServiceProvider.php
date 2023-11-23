<?php

namespace App\Providers;

use App\Helpers\Cart;
use App\Helpers\Wishlist;
use App\Models\ProductCategory as ModelsProductCategory;
use App\Models\User as ModelsUser;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();

        view()->composer(['*'], function ($view) {
            $adminn = ModelsUser::where('level', 1)->get();
            $cats = ModelsProductCategory::get();
            $wishlists = new Wishlist();
            $carts = new Cart();
            $cartss = $carts->getCart();
            $customersss = ModelsUser::where('level', 0)->orderBy('id', 'DESC')->get();
            $view->with(compact('cats', 'cartss', 'carts', 'wishlists', 'adminn', 'customersss'));
        });
    }
}
