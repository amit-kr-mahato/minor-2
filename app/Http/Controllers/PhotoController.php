<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'images.*' => 'required|image|max:5120',  // max 5MB
        'captions.*' => 'nullable|string|max:255',
     
    ]);

    $images = $request->file('images');
    $captions = $request->input('captions', []);
  

    $savedPhotos = [];

    foreach ($images as $index => $image) {
        $path = $image->store('public/uploads');

        $caption = $captions[$index] ?? null;

        $photo = Photo::create([
         
            'image_path' => $path,
            'caption' => $caption,
        ]);

        $savedPhotos[] = [
            'id' => $photo->id,
            'path' => Storage::url($path),
            'caption' => $caption,
        ];
    }

    return response()->json([
        'message' => 'Images uploaded successfully!',
        'photos' => $savedPhotos,
    ]);
}
}