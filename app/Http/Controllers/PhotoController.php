<?php

namespace App\Http\Controllers;
use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'photo' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);

    $path = $request->file('photo')->store('public/photos');

    $photo = new Photo();
    $photo->photo = str_replace('public/', 'storage/', $path);
    $photo->save();

    return back()->with('success', 'Photo uploaded successfully!');
}
}
