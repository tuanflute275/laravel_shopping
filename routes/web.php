<?php

use App\Http\Controllers\Blog;
use App\Http\Controllers\BlogComment;
use App\Http\Controllers\Brand;
use App\Http\Controllers\Customer\Account;
use App\Http\Controllers\Customer\PagesController;
use App\Http\Controllers\Customer\ShopController;
use App\Http\Controllers\customer\CartController;
use App\Http\Controllers\customer\WishlistController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Order;
use App\Http\Controllers\customer\OrderController;
use App\Http\Controllers\Product;
use App\Http\Controllers\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductCategory as Category;
use App\Http\Controllers\ProductComment;
use App\Http\Controllers\User as ControllersUser;

Route::group(['prefix' => ''], function () {
    Route::get('/', [PagesController::class, 'homePage'])->name('home.index');
    Route::get('/contact', [PagesController::class, 'contactPage'])->name('contact');
    Route::get('/about', [PagesController::class, 'aboutPage'])->name('about');
    Route::get('/shop', [PagesController::class, 'shopPage'])->name('shop');
    Route::get('/blog', [PagesController::class, 'blog'])->name('blog');
    Route::get('/blogDetail/{id}', [PagesController::class, 'blogDetail'])->name('blogDetail');
    Route::get('/cart', [PagesController::class, 'cartPage'])->name('cart');
    Route::get('/wishlist', [PagesController::class, 'wishlistPage'])->name('wishlist');
    Route::get('/shop/product/{id}', [PagesController::class, 'productDetail'])->name('shop.detail');
    Route::get('/shop/{id}', [PagesController::class, 'product'])->name('shop.product');
    Route::get('/shop/brand/{brand_id}', [PagesController::class, 'productByBrand'])->name('shop.productBrand');


    Route::post('/shop/{id}', [PagesController::class, 'postComment'])->name('shop.postComment');
    Route::get('/deleteCommentProduct/{product_id}', [PagesController::class, 'deleteCommentProduct'])->name('deleteCommentProduct');
    Route::post('/contact', [PagesController::class, 'postContact'])->name('postContact');
    Route::post('/blog/{blog_id}', [PagesController::class, 'postBlogCmt'])->name('postBlogCmt');
    Route::get('/deleteCmtBlog/{blog_id}', [PagesController::class, 'deleteCommentBlog'])->name('deleteCommentBlog');
    Route::post('/about', [PagesController::class, 'postAbout'])->name('postAbout');


    Route::group(['prefix' => 'cart', 'middleware' => 'user'], function () {
        Route::get('/', [CartController::class, 'index'])->name('shop.show_cart')->middleware('user');
        Route::post('/{id}', [CartController::class, 'add_to_cart'])->name('shop.cart');
        Route::post('/update/{id}', [CartController::class, 'update_cart'])->name('shop.update_cart');
        Route::get('/delete/{id}', [CartController::class, 'delete'])->name('shop.delete_cart');
        Route::get('/clear', [CartController::class, 'clear'])->name('shop.clear_cart');
    });

    Route::group(['prefix' => 'wishlist', 'middleware' => 'user'], function () {
        Route::get('/', [WishlistController::class, 'index'])->name('shop.show_Wishlist')->middleware('user');
        Route::post('/{id}', [WishlistController::class, 'add_to_wishlist'])->name('shop.Wishlist');
        Route::post('add/{id}', [WishlistController::class, 'add_to_cart'])->name('shop.Wishlist.add');
        Route::get('/delete/{id}', [WishlistController::class, 'delete'])->name('shop.delete_wishlist');
        Route::get('/clear', [WishlistController::class, 'clear'])->name('shop.clear_wishlist');
    });

    Route::group(['prefix' => 'order', 'middleware' => 'user'], function () {
        Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
        Route::post('/checkout', [OrderController::class, 'post_checkout'])->name('post_checkout');
        Route::get('order-success', [OrderController::class, 'order_success'])->name('order.success');
        Route::get('history', [OrderController::class, 'history'])->name('order.history');
        Route::get('detail/{order}', [OrderController::class, 'detail'])->name('order.detail');
    });


    Route::prefix('/user')->name('user.')->group(function () {

        Route::get('/profile', [Account::class, 'profile'])->name('profile');
        Route::post('/profile', [Account::class, 'editUser'])->name('editUser');

        Route::get('/register', [Account::class, 'register'])->name('register');
        Route::post('/register', [Account::class, 'saveUser'])->name('register');

        Route::get('/login', [Account::class, 'login'])->name('login');
        Route::post('/login', [Account::class, 'doLogin'])->name('doLogin');

        Route::get('/sign-out', [Account::class, 'sign_out'])->name('sign-out');
    });
});


Route::middleware('admin')->prefix("admin")->name('admin.')->group(function () {
    Route::get('/', [Dashboard::class, 'index'])->name('index');
    Route::get('/click', [Dashboard::class, 'click'])->name('click');

    // brand
    Route::get('/brand/recycle-bin', [Brand::class, 'recycle_bin'])->name('brand.recycle_bin');
    Route::get('/brand/restore/{id}', [Brand::class, 'restored'])->name('brand.restore');
    Route::delete('/brand/delete/{id}', [Brand::class, 'force_delete'])->name('brand.force_delete');

    //category
    Route::get('/category/recycle-bin', [Category::class, 'recycle_bin'])->name('category.recycle_bin');
    Route::get('/category/restore/{id}', [Category::class, 'restored'])->name('category.restore');
    Route::delete('/category/delete/{id}', [Category::class, 'force_delete'])->name('category.force_delete');

    //user
    Route::get('/user/recycle-bin', [User::class, 'recycle_bin'])->name('user.recycle_bin');
    Route::get('/user/restore/{id}', [User::class, 'restored'])->name('user.restore');
    Route::delete('/user/delete/{id}', [User::class, 'force_delete'])->name('user.force_delete');

    //product
    Route::get('/product/recycle-bin', [Product::class, 'recycle_bin'])->name('product.recycle_bin');
    Route::get('/product/restore/{id}', [Product::class, 'restored'])->name('product.restore');
    Route::delete('/product/delete/{id}', [Product::class, 'force_delete'])->name('product.force_delete');


    Route::resources([
        'user' => ControllersUser::class,
        'category' => Category::class,
        'brand' => Brand::class,
        'product' => Product::class,
        'order' => Order::class,
        'blog' => Blog::class,
        'blog_comment' => BlogComment::class,
        'product_comment' => ProductComment::class,
    ]);
});

// admin authenticate
Route::get('/sign-up', [User::class, 'sign_up'])->name('admin.sign-up');
Route::post('/saveUser', [User::class, 'saveUser'])->name('admin.store');
Route::get('/sign-out', [User::class, 'sign_out'])->name('admin.sign-out');

Route::get('/logon', [User::class, 'logon'])->name('admin.logon');
Route::post('/logon', [User::class, 'doLogon'])->name('admin.logon');
Route::fallback(function () {
    return view('customer.404.index');
});
