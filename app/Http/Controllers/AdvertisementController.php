<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdvertisementController extends Controller
{
public function index()
{
    return view('admin.advertisements.create', [
        'ads' => Advertisement::latest()->get(), // Load all ads (no pagination)
        'topAds' => Advertisement::where('position', 'top')->where('status', 'active')->get(),
        'sidebarAds' => Advertisement::where('position', 'sidebar')->where('status', 'active')->get(),
        'bottomAds' => Advertisement::where('position', 'bottom')->where('status', 'active')->get(),
    ]);
}



    public function create()
{
    $ads = Advertisement::all();
    return view('admin.advertisements.create', compact('ads'));
}


    public function toggleStatus($id)
{
    $ads = Advertisement::findOrFail($id);
    $ads->status = $ads->status === 'active' ? 'inactive' : 'active';
    $ads->save();

    return redirect()->back()->with('success', 'Advertisement status updated.');
}


    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048',
            'position' => 'required|string',
            'status' => 'required|in:active,inactive',
        ]);

        $imagePath = $request->file('image')->store('ads', 'public');

        Advertisement::create([
            'image' => $imagePath,
            'position' => $request->position,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.advertisements.index')
                         ->with('success', 'Advertisement created successfully.');
    }

    public function edit(Advertisement $advertisement)
    {
        return view('admin.advertisements.edit', compact('advertisement'));
    }

    public function update(Request $request, Advertisement $advertisement)
    {
        $request->validate([
            'position' => 'required|string',
            'status' => 'required|in:active,inactive',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['position', 'status']);

        if ($request->hasFile('image')) {
            // delete old image
            if ($advertisement->image) {
                Storage::disk('public')->delete($advertisement->image);
            }
            $data['image'] = $request->file('image')->store('ads', 'public');
        }

        $advertisement->update($data);

        return redirect()->route('admin.advertisements.index')
                         ->with('success', 'Advertisement updated successfully.');
    }

    public function destroy(Advertisement $advertisement)
    {
        if ($advertisement->image) {
            Storage::disk('public')->delete($advertisement->image);
        }

        $advertisement->delete();

        return redirect()->route('admin.advertisements.index')
                         ->with('success', 'Advertisement deleted successfully.');
    }

    public function showTopAds()
    {
        $ads = Advertisement::where('position', 'top')
                            ->where('status', 'active')
                            ->get();

        return view('ads.top', compact('ads'));
    }
}
