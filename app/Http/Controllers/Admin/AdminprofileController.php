<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminprofileController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        return view('admin.profile.profile',compact('user'));
    }

    public function updateprofile(Request $request)
    {
    $user = User::find($request->id);
    $user->name = $request->input('name');

    if ($request->password) {
        $user->password = Hash::make($request->password);
    }
    $user->save();
    return redirect()->route('adminprofile');
    }

}
