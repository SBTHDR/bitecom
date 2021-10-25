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
        return view('frontend.index', compact('categories', 'sliders', 'products'));
    }
}
