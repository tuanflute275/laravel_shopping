<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostComment;
use App\Models\Blog;
use App\Models\BlogComment;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\CommonFunction\CommonFunction;

class PagesController extends Controller
{
    // start Home Page
    public function homePage()
    {
        $newProducts = Product::orderBy('id', 'DESC')->limit(8)->get();
        $blogs = Blog::orderBy('id', 'ASC')->limit(3)->get();
        $best_selling_product = Product::orderBy('discount', 'DESC')->limit(8)->get();
        return view('customer.home.index', compact('best_selling_product', 'blogs', 'newProducts'));
    }

    // end Home Page



    // start contactPage
    public function contactPage()
    {
        return view('customer.contact.index');
    }
    public function postContact(PostComment $request)
    {
        $form_data = $request->all();
        $commonFunction = new CommonFunction();
        return $commonFunction->handleNotifyAndRedirect('success', 'Insert Data Sucessfully', 'contact');
    }
    // end contactPage


    // start aboutPage
    public function aboutPage()
    {
        return view('customer.about.index');
    }
    public function postAbout(PostComment $request)
    {
        $commonFunction = new CommonFunction();
        return $commonFunction->handleNotifyAndRedirect('success', 'Insert Data Sucessfully', 'about');
    }
    // end aboutPage



    // start shopPage
    public function shopPage()
    {
        $products = Product::all();
        $brands = Brand::all();
        $categories = ProductCategory::all();
        $allProducts = Product::search()->filter()->paginate(9)->withQueryString();
        return view('customer.product.shop', compact('products', 'allProducts', 'categories', 'brands'));
    }

    public function product($id)
    {
        $products = Product::all();
        $categories = ProductCategory::all();
        $brands = Brand::all();
        $cate = ProductCategory::find($id);
        $allProducts = $cate->products()->paginate(9)->withQueryString();
        return view('customer.product.shop', compact('allProducts', 'categories','products', 'brands'));
    }

    public function productByBrand($brand_id)
    {
        $products = Product::all();
        $categories = ProductCategory::all();
        $brands = Brand::all();

        $brand = Brand::find($brand_id);
        $allProducts = $brand->products()->paginate(9)->withQueryString();

        return view('customer.product.shop', compact('allProducts', 'categories','products', 'brands'));
    }


    // end shopPage


    public function blog()
    {
        $blogs = Blog::search()->orderBy('id', 'desc')->paginate(6)->withQueryString();
        return view('customer.blog.index', compact('blogs'));
    }


    // start blogDetail
    public function blogDetail($id)
    {
        $blog = Blog::find($id);
        $blogComments = $blog->blogComments;
        return view('customer.blogDetail.index', compact('blogComments', 'blog'));
    }

    public function postBlogCmt(PostComment $request, string $blog_id)
    {
        if(!Auth::check()){
            $commonFunction = new CommonFunction();
            return $commonFunction->handleNotifyAndBack('error', 'Please login');
        }else{
            $user_id = Auth::user()->id;
            BlogComment::create([
                'blog_id' => $blog_id,
                'user_id' => $user_id,
                'email' => $request->email,
                'messages' => $request->message
            ]);
            $commonFunction = new CommonFunction();
            return $commonFunction->handleNotifyAndBack('success', 'Insert Data Sucessfully');
        }
    }

    public function deleteCommentBlog($id){
        $commonFunction = new CommonFunction();
        try {
            $user_id = BlogComment::find($id)->user_id;
            if(Auth::user()->id == $user_id){
                BlogComment::find($id)->delete();
                return $commonFunction->handleNotifyAndBack('success', 'Delete comment successfully');
            }else{
                return $commonFunction->handleNotifyAndBack('error', 'Delete comment failed');
            }

        } catch (\Throwable $th) {
            return $commonFunction->handleNotifyAndBack('error', 'Delete comment failed');
        }
    }
    // end blogDetail



    public function cartPage()
    {
        return view('customer.cart.index');
    }


    // start wishlistPage
    public function wishlistPage()
    {
        return view('customer.wishlist.index');
    }
    // end wishlistPage


    // start product Detail
    public function productDetail($id)
    {
        $product = Product::find($id);
        $RelatedProducts = Product::orderBy('id', 'DESC')->where('product_category_id', $product->id)->limit(4)->get();
        $comments = $product->productComments;
        return view('customer.product.detail', compact('product', 'comments', 'RelatedProducts'));
    }
    public function postComment(PostComment $request, $id)
    {
        $commonFunction = new CommonFunction();
        if(!Auth::check()){
            return $commonFunction->handleNotifyAndBack('error', 'Please login');
        }else{
            $user_id = Auth::user()->id;
            ProductComment::create([
                'product_id' => $id,
                'user_id' => $user_id,
                'email' => $request->email,
                'messages' => $request->comment,
            ]);
            return $commonFunction->handleNotifyAndBack('success', 'Insert Data Sucessfully');
        }
    }

    public function deleteCommentProduct($id){
        $commonFunction = new CommonFunction();
        try {
            $user_id = ProductComment::find($id)->user_id;
            if(Auth::user()->id == $user_id){
                ProductComment::find($id)->delete();
                return $commonFunction->handleNotifyAndBack('success', 'Delete comment successfully');
            }else{
                return $commonFunction->handleNotifyAndBack('error', 'Delete comment failed');
            }

        } catch (\Throwable $th) {
            return $commonFunction->handleNotifyAndBack('error', 'Delete comment failed');
        }
    }
    // end product Detail



    public function pageNotFound()
    {
        return view('customer.404.index');
    }
}
