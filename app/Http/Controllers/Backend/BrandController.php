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
            'brand_slug_bn' => str_replace(' ', '-', $request->brand_name_bn),
            'brand_image' => $resizedImage,
        ]);

        $notification = array(
            'message' => 'Brand created successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('brand.index')->with($notification);
    }

    public function edit($id)
    {
        $brand = Brand::findOrfail($id);

        return view('backend.brands.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $brand = Brand::findOrfail($id);

        $request->validate([
            'brand_name_en' => ['required'],
            'brand_name_bn' => ['required'],
        ],[
            'brand_name_en.required' => 'Brand name required in English',
            'brand_name_bn.required' => 'Brand name required in Bangla',
        ]);

        if ($request->file('brand_image')) {
            $image = $request->file('brand_image');
            @unlink(public_path('upload/brand/'.$brand->brand_image));
            $imageName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('upload/brand/'.$imageName);
            $resizedImage = $imageName;

            $brand->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_bn' => $request->brand_name_bn,
                'brand_slug_en' => Str::slug($request->brand_name_en),
                'brand_slug_bn' => str_replace(' ', '-', $request->brand_name_bn),
                'brand_image' => $resizedImage,
            ]);

            $notification = array(
                'message' => 'Brand created successfully!',
                'alert-type' => 'success'
            );
    
            return redirect()->route('brand.index')->with($notification);
        } else {
            $brand->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_bn' => $request->brand_name_bn,
                'brand_slug_en' => Str::slug($request->brand_name_en),
                'brand_slug_bn' => str_replace(' ', '-', $request->brand_name_bn),
            ]);

            $notification = array(
                'message' => 'Brand created successfully!',
                'alert-type' => 'success'
            );
    
            return redirect()->route('brand.index')->with($notification);
        }
    }

    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        @unlink(public_path('upload/brand/'.$brand->brand_image));
        $brand->delete();

        return redirect()->back();
    }
}
