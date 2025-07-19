<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::with('images')->get();
        return view('businessdashboard.menu.index', compact('menus'));
    }

    public function create()
    {
        return view('businessdashboard.menu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $menu = Menu::create(); // If you want to add name/description, include fields

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('menu_images', 'public');
                $menu->images()->create(['image_path' => $path]);
            }
        }

        return redirect()->route('menu.index')->with('success', 'Menu created.');
    }

    public function edit(Menu $menu)
    {
        $menu->load('images');
        return view('businessdashboard.menu.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('menu_images', 'public');
                $menu->images()->create(['image_path' => $path]);
            }
        }

        return redirect()->route('menu.index')->with('success', 'Images updated.');
    }

    public function destroy(Menu $menu)
    {
        foreach ($menu->images as $image) {
            Storage::disk('public')->delete($image->image_path);
        }

        $menu->delete();

        return back()->with('success', 'Menu deleted.');
    }

    public function deleteImage(MenuImage $menuImage)
    {
        Storage::disk('public')->delete($menuImage->image_path);
        $menuImage->delete();

        return back()->with('success', 'Image deleted.');
    }
}
