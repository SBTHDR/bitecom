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
}
