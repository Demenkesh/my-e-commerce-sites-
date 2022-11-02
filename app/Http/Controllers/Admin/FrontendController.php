<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index()
    {
        $category = Category::count();
        $product = Product::count();
        $outstock = Product::where('qty', '0')->count();
        $user = User::where('role_as', '0')->count();
        $admin = User::where('role_as', '1')->count();
        $sale = Order::where('status', '1')->count();
        $sales = Order::where('status', '0')->count();
        $cart = Cart::count();
        return view('admin.index', compact('category', 'product', 'user', 'sale', 'sales', 'cart','admin','outstock'));
    }
}
