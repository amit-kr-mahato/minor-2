<?php

namespace App\Http\Controllers;

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
