<?php

namespace App\Http\Controllers\Backend;


use App\Models\Admin;
use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::latest()->get();
        return view('backend.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('backend.brands.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand_name_en' => ['required'],
            'brand_name_bn' => ['required'],
            'brand_image' => ['required'],
        ],[
            'brand_name_en.required' => 'Brand name required in English',
            'brand_name_bn.required' => 'Brand name required in Bangla',
        ]);

        $image = $request->file('brand_image');
        $imageName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/brand/'.$imageName);
        $resizedImage = $imageName;

        Brand::create([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_bn' => $request->brand_name_bn,
            'brand_slug_en' => Str::slug($request->brand_name_en),
            'brand_slug_bn' => Str::slug($request->brand_name_bn),
            'brand_image' => $resizedImage,
        ]);

        return redirect()->route('brand.index');
    }
}