<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Rating;
use App\Models\Review;
use App\Models\Slider;
use App\Models\Product;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
// use Illuminate\Http\Request;
use Mail;

class FrontendController extends Controller
{
    public function index()
    {
        $category = new Category();
        $products = new Product();
        $products1 = new Product();
        $products2 = new Product();
        $slider = new Slider();
        $slider = Slider::where('status', '1')->get();
        $featured_products = Category::where($category->name)->take(4)->get();
        $products = Product::where($products->name)->where('trending', '1')->take(4)->get();
        $products1 = Product::where($products1->name)->where('bigdiscount', '1')->get();
        $products2 = Product::where($products2->name)->where('newarrival', '1')->get();
        return view('frontend.index', compact('featured_products', 'products', 'products1', 'products2', 'slider'));
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function categoryview()
    {
        $category = new Category();

        $featured_products = Category::where($category->name)->get();
        return view('frontend.categoryview', compact('featured_products'));
    }
    public function productviews()
    {
        if (Request::get('sort') == 'price_asc') {
            $products = new Product();
            $products = Product::where($products->name)
                ->orderBy('selling_price', 'asc')
                ->where('trending', '1')->get();
        } elseif (Request::get('sort') == 'price_desc') {
            $products = new Product();
            $products = Product::where($products->name)
                ->orderBy('selling_price', 'desc')
                ->where('trending', '1')->get();
        } elseif (Request::get('sort') == 'bigdiscount') {
            $products = new Product();
            $products = Product::where($products->name)
                ->where('bigdiscount', '1')
                ->where('bigdiscount', '1')->get();
        } elseif (Request::get('sort') == 'newarrival') {
            $products = new Product();
            $products = Product::where($products->name)
                ->orderBy('created_at', 'desc')
                ->where('newarrival', '1')->get();
        } else {
            $products = new Product();
            $products  = Product::where($products->name)->get();
        }
        return view('frontend.productviews', compact('products',));
    }
    public function products($category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        if ($category) {
            $products = $category->products()->get();
            return view('frontend.product', compact(
                'products',
                'category'
            ));
        }

        return redirect()->back();
    }

    public function productView(string $category_slug, string $product_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        if ($category) {
            $product = $category->products()->where('slug', $product_slug)->where('trending', '1')->first();
            if ($product) {
                $ratings = Rating::where('prod_id', $product->id)->get();
                $rating_sum = Rating::where('prod_id', $product->id)->sum('stars_rated');;
                $user_rating = Rating::where('prod_id', $product->id)->where('user_id', Auth::id())->first();
                $reviews = Review::where('prod_id', $product->id)->get();
                if ($ratings->count() > 0) {
                    $rating_value = $rating_sum / $ratings->count();
                } else {
                    $rating_value = 0;
                }
                return view('frontend.productview', compact('product', 'category', 'reviews', 'ratings', 'rating_value', 'user_rating'));
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }
    public function trendingcategory()
    {
        $category = new Category();
        $featured_products = Category::where('popular', '1')->get();
        return view('frontend.trendingcategory', compact('featured_products'));
    }
    public function featurecategory()
    {
        $category = new Category();
        $featured_products = Category::where('status', '1')->get();
        return view('frontend.featurecategory', compact('featured_products'));
    }
    public function allcategories()
    {
        $category = new Category();
        $featured_products = Category::where($category->name)->get();
        return view('frontend.allcategories', compact('featured_products'));
    }


}
