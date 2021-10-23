<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    public function adminProfile()
    {
        $admin = Admin::find(1);
        return view('admin.admin-profile', compact('admin'));
    }

    public function adminProfileEdit()
    {
        $admin = Admin::find(1);
        return view('admin.admin-profile-edit', compact('admin'));
    }

    public function adminProfileStore(Request $request)
    {
        $admin = Admin::find(1);
        $admin->name = $request->name;    
        $admin->email = $request->email;

        if ($request->file('profile_photo_path')) {
            $fileName = $request->file('profile_photo_path');
            @unlink(public_path('upload/admin/'.$admin->profile_photo_path));
            $imageName = date('YmdHi').$fileName->getClientOriginalName();
            $fileName->move(public_path('upload/admin'), $imageName);
            $admin->profile_photo_path = $imageName;
        }

        $admin->save();

        $notification = array(
            'message' => 'Profile updated successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);

    }
}
