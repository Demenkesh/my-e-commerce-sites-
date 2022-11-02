<?php

namespace App\Http\Controllers\Frontend;


use App\Models\Product;


use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class Frontend2Controller extends Controller
{

    public function productlistAjax()
    {
        $product = Product::select('name')->where('trending', '1')->get();
        $data = [];
        foreach ($product as $item) {
            $data[] = $item['name'];
        }
        return $data;
    }
    public function searchproduct(Request $request)
    {
        $searched_product = $request->product_name;
        if ($searched_product != "") {
            $product = Product::where("name","LIKE","%$searched_product%")->first();
            if ($product) {
                return redirect('collections/' . $product->category->slug . '/' . $product->slug);
            } else {
                return redirect()->back()->with('error', 'No product found!!!');
            }
        }
        else {
            return redirect()->back();
        }
    }
}
