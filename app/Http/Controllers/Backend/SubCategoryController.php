<?php

namespace App\Http\Controllers\Backend;

use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subCategories = SubCategory::latest()->get();
        return view('backend.sub_categories.index', compact('subCategories'));
    }

    public function create()
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        return view('backend.sub_categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sub_category_name_en' => ['required'],
            'sub_category_name_bn' => ['required'],
            'category_id' => ['required'],
        ],[
            'sub_category_name_en.required' => 'Sub Category name required in English',
            'sub_category_name_bn.required' => 'Sub Category name required in Bangla',
        ]);

        SubCategory::create([
            'sub_category_name_en' => $request->sub_category_name_en,
            'sub_category_name_bn' => $request->sub_category_name_bn,
            'sub_category_slug_en' => Str::slug($request->sub_category_name_en),
            'sub_category_slug_bn' => str_replace(' ', '-', $request->sub_category_name_bn),
            'category_id' => $request->category_id,
        ]);

        $notification = array(
            'message' => 'Sub Category created successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('sub.category.index')->with($notification);
    }

    public function edit($id)
    {
        $subCategory = SubCategory::findOrfail($id);
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        return view('backend.sub_categories.edit', compact('subCategory', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $subCategory = SubCategory::findOrfail($id);

        $request->validate([
            'sub_category_name_en' => ['required'],
            'sub_category_name_bn' => ['required'],
        ],[
            'sub_category_name_en.required' => 'Sub Category name required in English',
            'sub_category_name_bn.required' => 'Sub Category name required in Bangla',
        ]);

        $subCategory->update([
            'sub_category_name_en' => $request->sub_category_name_en,
            'sub_category_name_bn' => $request->sub_category_name_bn,
            'sub_category_slug_en' => Str::slug($request->sub_category_name_en),
            'sub_category_slug_bn' => str_replace(' ', '-', $request->sub_category_name_bn),
            'category_id' => $request->category_id,
        ]);

        $notification = array(
            'message' => 'Sub Category updated successfully!',
            'alert-type' => 'info'
        );

        return redirect()->route('sub.category.index')->with($notification);
    }

    public function destroy($id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->delete();

        return redirect()->back();
    }
}
