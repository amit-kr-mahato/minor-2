<?php

namespace App\Http\Controllers;
use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
public function store(Request $request)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
            'captions' => 'array'
        ]);

        foreach ($request->file('images') as $index => $image) {
            $path = $image->store('uploads', 'public');
            Photo::create([
                'photo' => $path,
                'caption' => $request->captions[$index] ?? null
            ]);
        }

        return response()->json(['message' => 'Uploaded successfully']);
    }
}
