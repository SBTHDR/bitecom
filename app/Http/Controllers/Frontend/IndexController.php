<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function ProductSearch(Request $request){

        $request->validate(["search" => "required"]);
        $item = $request->search;
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $products = Product::where('product_name','LIKE',"%$item%")->get();
        return view('frontend.products.search',compact('products','categories'));
    }

    public function SearchProduct(Request $request){
        $request->validate(["search" => "required"]);

        $item = $request->search;

        $products = Product::where('product_name','LIKE',"%$item%")->select('product_name','product_thumbnail')->limit(5)->get();
        return view('frontend.products.search_product',compact('products'));
    }
}