<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('backend.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('backend.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name_en' => ['required'],
            'category_name_bn' => ['required'],
            'category_icon' => ['required'],
        ],[
            'category_name_en.required' => 'Category name required in English',
            'category_name_bn.required' => 'Category name required in Bangla',
        ]);

        Category::create([
            'category_name_en' => $request->category_name_en,
            'category_name_bn' => $request->category_name_bn,
            'category_slug_en' => Str::slug($request->category_name_en),
            'category_slug_bn' => str_replace(' ', '-', $request->category_name_bn),
            'category_icon' => $request->category_icon,
        ]);

        $notification = array(
            'message' => 'Category created successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('category.index')->with($notification);
    }

    public function edit($id)
    {
        $category = Category::findOrfail($id);

        return view('backend.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrfail($id);

        $request->validate([
            'category_name_en' => ['required'],
            'category_name_bn' => ['required'],
            'category_icon' => ['required'],
        ],[
            'category_name_en.required' => 'Category name required in English',
            'category_name_bn.required' => 'Category name required in Bangla',
        ]);

        $category->update([
            'category_name_en' => $request->category_name_en,
            'category_name_bn' => $request->category_name_bn,
            'category_slug_en' => Str::slug($request->category_name_en),
            'category_slug_bn' => str_replace(' ', '-', $request->category_name_bn),
            'category_icon' => $request->category_icon,
        ]);

        $notification = array(
            'message' => 'Category created successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('category.index')->with($notification);
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->back();
    }
}
