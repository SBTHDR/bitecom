<?php

namespace App\Http\Controllers\Backend;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('backend.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('backend.sliders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'slider_image' => ['required'],
        ]);

        $image = $request->file('slider_image');
        $imageName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(870,370)->save('upload/sliders/'.$imageName);
        $resizedImage = $imageName;

        Slider::create([
            'title' => $request->title,
            'description' => $request->description,
            'slider_image' => $resizedImage,
        ]);

        $notification = array(
            'message' => 'Slider created successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('sliders.index')->with($notification);
    }

    public function edit($id)
    {
        $slider = Slider::findOrfail($id);
        return view('backend.sliders.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $slider = Slider::findOrfail($id);

        $request->validate([
            'title' => ['required'],
            'description' => ['required'],
        ]);

        if ($request->file('slider_image')) {
            $image = $request->file('slider_image');
            @unlink(public_path('upload/sliders/'.$slider->slider_image));
            $imageName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(870,370)->save('upload/sliders/'.$imageName);
            $resizedImage = $imageName;

            $slider->update([
                'title' => $request->title,
                'description' => $request->description,
                'slider_image' => $resizedImage,
            ]);
    
            $notification = array(
                'message' => 'Slider Updated successfully!',
                'alert-type' => 'success'
            );
    
            return redirect()->route('sliders.index')->with($notification);
        } else {
            $slider->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);
    
            $notification = array(
                'message' => 'Slider Updated successfully!',
                'alert-type' => 'success'
            );
    
            return redirect()->route('sliders.index')->with($notification);
        }
    }

    public function destroy($id)
    {
        $slider = Slider::findOrfail($id);
        @unlink(public_path('upload/products/'.$slider->slider_image));
        $slider->delete();

        return redirect()->back();
    }
}
