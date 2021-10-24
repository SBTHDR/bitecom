<?php

namespace App\Http\Controllers\Backend;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('backend.products.index', compact('products'));
    }

    public function create()
    {
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $subCategories = SubCategory::latest()->get();
        return view('backend.products.create', compact('brands', 'categories', 'subCategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand_id' => ['required'],
            'category_id' => ['required'],
            'sub_category_id' => ['required'],
            'product_name' => ['required'],
            'product_code' => ['required'],
            'product_quantity' => ['required'],
            'product_color' => ['required'],
            'sell_price' => ['required'],
            'product_description' => ['required'],
            'product_thumbnail' => ['required'],
        ]);

        $image = $request->file('product_thumbnail');
        $imageName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/products/'.$imageName);
        $resizedImage = $imageName;

        Product::create([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'product_name' => $request->product_name,
            'product_slug' => Str::slug($request->product_name),
            'product_code' => $request->product_code,
            'product_quantity' => $request->product_quantity,
            'product_color' => $request->product_color,
            'sell_price' => $request->sell_price,
            'discount_price' => $request->discount_price,
            'product_description' => $request->product_description,
            'featured_product' => $request->featured_product,
            'hot_deals' => $request->hot_deals,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'product_thumbnail' => $resizedImage,
            'status' => 1,
        ]);

        $notification = array(
            'message' => 'Product created successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('products.index')->with($notification);
    }

    public function edit($id)
    {
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $subCategories = SubCategory::latest()->get();

        $product = Product::findOrfail($id);
        return view('backend.products.edit', compact('product', 'brands', 'categories', 'subCategories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrfail($id);

        $request->validate([
            'brand_id' => ['required'],
            'category_id' => ['required'],
            'sub_category_id' => ['required'],
            'product_name' => ['required'],
            'product_code' => ['required'],
            'product_quantity' => ['required'],
            'product_color' => ['required'],
            'sell_price' => ['required'],
            'product_description' => ['required'],
        ]);

        if ($request->file('product_thumbnail')) {
            $image = $request->file('product_thumbnail');
            @unlink(public_path('upload/products/'.$product->product_thumbnail));
            $imageName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('upload/products/'.$imageName);
            $resizedImage = $imageName;

            $product->update([
                'brand_id' => $request->brand_id,
                'category_id' => $request->category_id,
                'sub_category_id' => $request->sub_category_id,
                'product_name' => $request->product_name,
                'product_slug' => Str::slug($request->product_name),
                'product_code' => $request->product_code,
                'product_quantity' => $request->product_quantity,
                'product_color' => $request->product_color,
                'sell_price' => $request->sell_price,
                'discount_price' => $request->discount_price,
                'product_description' => $request->product_description,
                'featured_product' => $request->featured_product,
                'hot_deals' => $request->hot_deals,
                'special_offer' => $request->special_offer,
                'special_deals' => $request->special_deals,
                'product_thumbnail' => $resizedImage,
                'status' => 1,
            ]);
    
            $notification = array(
                'message' => 'Product Updated successfully!',
                'alert-type' => 'success'
            );
    
            return redirect()->route('products.index')->with($notification);
        } else {
            $product->update([
                'brand_id' => $request->brand_id,
                'category_id' => $request->category_id,
                'sub_category_id' => $request->sub_category_id,
                'product_name' => $request->product_name,
                'product_slug' => Str::slug($request->product_name),
                'product_code' => $request->product_code,
                'product_quantity' => $request->product_quantity,
                'product_color' => $request->product_color,
                'sell_price' => $request->sell_price,
                'discount_price' => $request->discount_price,
                'product_description' => $request->product_description,
                'featured_product' => $request->featured_product,
                'hot_deals' => $request->hot_deals,
                'special_offer' => $request->special_offer,
                'special_deals' => $request->special_deals,
                'status' => 1,
            ]);
    
            $notification = array(
                'message' => 'Product Updated successfully!',
                'alert-type' => 'success'
            );
    
            return redirect()->route('products.index')->with($notification);
        }
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        @unlink(public_path('upload/products/'.$product->product_thumbnail));
        $product->delete();

        return redirect()->back();
    }
}
