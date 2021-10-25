<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $sliders = Slider::orderBy('id', 'DESC')->limit(3)->get();
        $products = Product::orderBy('id', 'DESC')->get();
        $hotDeals = Product::where('hot_deals', 1)->orderBy('id', 'DESC')->limit(3)->get();
        return view('frontend.index', compact('categories', 'sliders', 'products', 'hotDeals'));
    }

    public function show($id)
    {
        $showProduct = Product::findOrFail($id);
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $sliders = Slider::orderBy('id', 'DESC')->limit(3)->get();
        $products = Product::orderBy('id', 'DESC')->get();
        return view('frontend.products.show', compact('showProduct', 'categories', 'sliders', 'products'));
    }

    public function addToCart($id)
    {
        $product = Product::with('brand', 'category')->findOrFail($id);
        $color = $product->product_color;
        $product_color = explode(',', $color);

        return response()->json(array(
            'product' => $product,
            'color' => $product_color,
        ));
    }
}
