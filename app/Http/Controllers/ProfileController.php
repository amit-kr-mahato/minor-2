<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // Show the edit profile page
    public function edit()
{
    $user = auth()->user();
    return view('admin.editprofile', compact('user'));
}

public function updatePassword(Request $request)
{
    $request->validate([
        'current_password' => ['required'],
        'new_password' => ['required', 'min:7', 'confirmed'],
    ]);

    if (!Hash::check($request->current_password, auth()->user()->password)) {
        return back()->withErrors(['current_password' => 'Current password is incorrect']);
    }

    auth()->user()->update([
        'password' => Hash::make($request->new_password),
    ]);

    return back()->with('status', 'Password changed successfully.');
}


    // Handle profile update
    public function update(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|email',
            'profile_photo' => 'nullable|image|max:2048',
        ]);

        $user = auth()->user();

        // Handle photo upload
        if ($request->hasFile('profile_photo')) {
            // Optionally delete the old one
            if ($user->profile_photo_path && Storage::disk('public')->exists($user->profile_photo_path)) {
                Storage::disk('public')->delete($user->profile_photo_path);
            }

            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->profile_photo_path = $path;
        }

        // Update user fields
        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
