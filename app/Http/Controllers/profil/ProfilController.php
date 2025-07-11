<?php

namespace App\Http\Controllers\profil;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function index()
    {
        return view("profile.index", ["user" => auth()->user()]);
    }

    public function edit()
    {
        return view("profile.edit", ["user" => auth()->user()]);
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $request->validate([
            "name" => "required|string|max:225|min:3",
            "profile_picture" => "nullable|image|mimes:jpg,jpeg,png|max:2048",
            'oldPassword' => 'nullable|string|min:6',
            'newPassword' => 'nullable|string|min:6|different:oldPassword',
        ]);

        if ($request->hasFile("profile_picture")) {
            $path = $request
                ->file("profile_picture")
                ->store("profile_pictures", "public");
            $user->profile_picture = $path;
        }

        if ($request->filled('oldPassword') && $request->filled('newPassword')) {
            if (Hash::check($request->oldPassword, $user->password)) {
                $user->password = Hash::make($request->newPassword);
            } else {
                return back()->withErrors(['oldPassword' => 'Old password is incorrect.']);
            }
        }

        $user->name = $request->name;
        $user->save();

        return redirect()
            ->back()
            ->with("success", "Profile updated successfully.");
    }
}
