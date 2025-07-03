<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Setting;


class SettingController extends Controller
{
    public function edit()
    {
        return view('admin.settings.edit');
    }

    public function update(Request $request)
    {
        if ($request->hasFile('favicon')) {
            $faviconPath = $request->file('favicon')->store('settings', 'public');
            Setting::updateOrCreate(['key' => 'favicon'], ['value' => $faviconPath]);
        }

        // other settings...

        return redirect()->back()->with('success', 'Settings updated successfully.');
    }
}
