<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuItemController extends Controller {
    public function index() {
        $business = auth()->user()->business;

        // If no business found, just return empty list instead of error
        if ( !$business ) {
            $menuItems = collect();
            // empty collection
        } else {
            $menuItems = MenuItem::where( 'business_id', $business->id )->get();
        }

        return view( 'businessdashboard.menu.index', compact( 'menuItems' ) );
    }

    public function create() {
        return view( 'businessdashboard.menu.create' );
    }

  public function store(Request $request)
{
    $request->validate([
        'name'     => 'required|string|max:255',
        'category' => 'required|string|max:255',
        'price'    => 'required|numeric|min:0',
        'image'    => 'nullable|image|max:2048',
    ]);

    $business = auth()->user()->business;

    if (!$business) {
        return back()->with('error', 'Business not found for this user.');
    }

    $r = new MenuItem();
    $r->name = $request->name;
    $r->category = $request->category;
    $r->price = $request->price;
    $r->business_id = $business->id;

    if ($request->hasFile('image')) {
        $r->image = $request->file('image')->store('menu_images', 'public');
    }

    $r->save();

    return redirect()->route('businessdashboard.menu.index')->with('success', 'Menu item added!');
}



    public function edit(MenuItem $menu)
    {
        $this->authorize('update', $menu);
        return view('businessdashboard.menu.edit', compact('menu'));
    }

  public function update(Request $request, MenuItem $menu)
{
    // Optional: authorize user if you have policies set
    $this->authorize('update', $menu);

    // Validate incoming data
    $request->validate([
        'name'     => 'required|string|max:255',
        'category' => 'required|string|max:255',
        'price'    => 'required|numeric|min:0',
        'image'    => 'nullable|image|max:2048',
    ]);

    // Prepare data to update
    $data = $request->only(['name', 'category', 'price']);

    // If a new image is uploaded, delete old one and store new
    if ($request->hasFile('image')) {
        if ($menu->image) {
            \Storage::disk('public')->delete($menu->image);
        }
        $data['image'] = $request->file('image')->store('menu_images', 'public');
    }

    // Update menu item
    $menu->update($data);

    // Redirect with success message
    return redirect()->route('businessdashboard.menu.index')->with('success', 'Menu item updated!');
}


    public function destroy(MenuItem $menu)
    {
        $this->authorize('delete', $menu);

        if ($menu->image) {
            Storage::disk('public')->delete($menu->image);
        }

        $menu->delete();

        return redirect()->route('businessdashboard.menu.index')->with('success', 'Menu item deleted!' );
    }
}
