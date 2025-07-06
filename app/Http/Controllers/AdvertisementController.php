<?php
namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdvertisementController extends Controller
{
    public function index()
    {
        $ads = Advertisement::all();
        return view('admin.advertisements.index', compact('ads'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|max:2048',
            'status' => 'required|in:active,inactive',
        ]);

        $path = $request->file('image')->store('ads_images', 'public');

        Advertisement::create([
            'title' => $validated['title'],
            'image' => $path,
            'status' => $validated['status'],
        ]);

        return redirect()->route('admin.advertisements.index')->with('success', 'Advertisement created successfully.');
    }

    public function edit($id)
    {
        $ad = Advertisement::findOrFail($id);
        return view('admin.advertisements.edit', compact('ad'));
    }

    public function update(Request $request, $id)
    {
        $ad = Advertisement::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'status' => 'required|in:active,inactive',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($ad->image);
            $ad->image = $request->file('image')->store('ads_images', 'public');
        }

        $ad->title = $validated['title'];
        $ad->status = $validated['status'];
        $ad->save();

        return redirect()->route('admin.advertisements.index')->with('success', 'Advertisement updated successfully.');
    }

    public function destroy($id)
    {
        $ad = Advertisement::findOrFail($id);
        Storage::disk('public')->delete($ad->image);
        $ad->delete();

        return redirect()->route('admin.advertisements.index')->with('success', 'Advertisement deleted successfully.');
    }

    public function toggleStatus($id)
    {
        $ad = Advertisement::findOrFail($id);
        $ad->status = $ad->status === 'active' ? 'inactive' : 'active';
        $ad->save();

        return redirect()->back()->with('success', 'Advertisement status updated.');
    }
}
