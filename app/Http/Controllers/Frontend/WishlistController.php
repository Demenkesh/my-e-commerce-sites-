<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class WishlistController extends Controller
{
    public function addproduct(Request $request)
    {
        $product_id = $request->input('product_id');
        if (Auth::check()) {
            $prod_check = Product::where('id', $product_id)->first();
            if ($prod_check) {
                if (Wishlist::where('prod_id', $product_id)->where('user_id', Auth::id())->exists()) {
                    return response()->json(['status' => $prod_check->name . "Already Added to Wishlist"]);
                } else {
                    $wishlistItem = new Wishlist();
                    $wishlistItem->prod_id = $product_id;
                    $wishlistItem->user_id = Auth::id();
                    $wishlistItem->save();
                    return response()->json(['status' => $prod_check->name . "Added to Wishlist"]);
                }
            }
        } else {
            return response()->json(['status' => "login to continue"]);
        }
    }
    public function viewwishlist()
    {

        $wishlistItems = Wishlist::where('user_id', Auth::id())->get();
        return view('frontend.wishlist', compact('wishlistItems'));
    }
    public function deleteproduct(Request $request)
    {
        if (Auth::check()) {
            $prod_id = $request->input('prod_id');
            if (Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {
                $wishlistItem = Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $wishlistItem->delete();
                return response()->json(['status' => "product Deleted Successfully"]);
            }
        }

        else{
            return response()->json(['status' => "login to continue"]);
        }
    }
    public function wishlistcount()
    {
        $wishlistcount = Wishlist::where('user_id',Auth::id())->count();
        return response()->json(['count'=> $wishlistcount]);
    }
}
