<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Brand;
use Illuminate\Http\Request;

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

    public function store()
    {
        
    }
}
