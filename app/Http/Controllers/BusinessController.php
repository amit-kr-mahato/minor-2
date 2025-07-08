<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class BusinessController extends Controller
{
    public function index()
    {
        $businesses = Business::with('user')->orderByDesc('created_at')->paginate(15);
        return view('admin.businesses.index', compact('businesses'));
    }

    public function create()
    {
        $users = User::all();
        return view('admin.businesses.editdelete', [
            'business' => new Business(),
            'users' => $users,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'province' => 'required|string|max:255',
            'business_name' => 'required|string|max:255',
            'address1' => 'required|string|max:255',
            'address2' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
            'longitude' => 'nullable|numeric',
            'latitude' => 'nullable|numeric',
            'phone' => 'required|string|max:50',
            'web_address' => 'nullable|url|max:255',
            'status' => 'required|in:active,pending,suspended',
            'email' => 'required|email|max:255',
            'categories' => 'required|string',
        ]);

        $data['categories'] = json_encode(array_map('trim', explode(',', $data['categories'])));

        Business::create($data);

        return redirect()->route('admin.businesses.index')->with('success', 'Business added successfully.');
    }

    public function edit(Business $business)
    {
        $users = User::all();
        return view('admin.businesses.editdelete', [
            'business' => $business,
            'users' => $users,
        ]);
    }

    public function updateStatus(Request $request, Business $business)
    {
        $request->validate([
            'status' => 'required|in:active,pending,suspended',
        ]);

        $business->status = $request->status;
        $business->save();

        return response()->json([
            'message' => 'Status updated successfully',
            'status' => $business->status,
        ]);
    }

    public function destroy(Business $business)
    {
        $business->delete();
        return redirect()->route('admin.businesses.index')->with('success', 'Business deleted successfully.');
    }

    public function searchOrAdd(Request $request)
    {
        $businessName = $request->query('business_name');
        $business = Business::where('business_name', 'like', "%{$businessName}%")->first();

        return view('addbusiness', [
            'business_name' => $business ? $business->business_name : $businessName,
            'business' => $business,
        ]);
    }

    public function business_store(Request $request)
    {
        $request->validate([
            'province' => 'required|string',
            'business_name' => 'required|string',
            'address1' => 'required|string',
            'city' => 'required|string',
            'postal_code' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'web_address' => 'nullable|url',
            'address2' => 'nullable|string',
            'categories' => 'required|array|min:1',
        ]);

        $business = new Business();
        $business->province = $request->province;
        $business->business_name = $request->business_name;
        $business->address1 = $request->address1;
        $business->address2 = $request->address2;
        $business->city = $request->city;
        $business->postal_code = $request->postal_code;
        $business->phone = $request->phone;
        $business->web_address = $request->web_address;
        $business->email = $request->email;
        $business->categories = json_encode($request->categories);
        $business->status = 'pending'; // default status

        $business->save();

        return redirect()->back()->with('success', 'Business added successfully!');
    }

    public function Repairs()
    {
        return view('project.repair');
    }

    public function Businessdetail()
    {
        return view('businessdetail');
    }

    public function Seemorephoto()
    {
        return view('seemorebusinessdetail');
    }

    public function businesssphoto()
    {
        return view('addphoto');
    }

    public function Blogin()
    {
        return view('businesform.Businesform');
    }

 

    public function dashboard() {
      $ratingCounts = DB::table('reviews')
        ->select('rating', DB::raw('count(*) as total'))
        ->groupBy('rating')
        ->orderBy('rating')
        ->get();

    $ratings = $ratingCounts->pluck('rating'); // [1, 2, 3, 4, 5]
    $totals = $ratingCounts->pluck('total');   // [3, 8, 15, 10, 4]

    return view('businessdashboard.dashboard', [
        'ratings' => $ratings,
        'ratingTotals' => $totals,
        'recentReviews' => Review::with(['user', 'business'])->latest()->take(5)->get(),
        'totalReviews' => Review::count(),
    ]);
}


//business controller of all business CRUD Operation
     
    public function Businessindex()
    {
        $businesses = Business::where('user_id', auth()->id())->get();
        return view('businessdashboard.businessinfo.index', compact('businesses'));
    }

    public function Businesscreate()
    {
        return view('businessdashboard.businessinfo.form', ['mode' => 'create']);
    }

    public function Businessstore(Request $request)
    {
        $validated = $request->validate([
            // validation rules ...
        ]);
        $validated['user_id'] = auth()->id();

        // handle file uploads (logo/banner)
        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('logos', 'public');
        }
        if ($request->hasFile('banner')) {
            $validated['banner'] = $request->file('banner')->store('banners', 'public');
        }

        Business::create($validated);

        return redirect()->route('businessdashboard.businessinfo.index')->with('success', 'Business created.');
    }

    public function Businessedit(Business $business)
    {
        $this->authorizeBusiness($business);
        return view('businessdashboard.businessinfo.form', ['business' => $business, 'mode' => 'edit']);
    }

    public function Businessupdate(Request $request, Business $business)
    {
        $this->authorizeBusiness($business);

        $validated = $request->validate([
            // validation rules ...
        ]);

        if ($request->hasFile('logo')) {
            if ($business->logo) Storage::disk('public')->delete($business->logo);
            $validated['logo'] = $request->file('logo')->store('logos', 'public');
        }

        if ($request->hasFile('banner')) {
            if ($business->banner) Storage::disk('public')->delete($business->banner);
            $validated['banner'] = $request->file('banner')->store('banners', 'public');
        }

        $business->update($validated);

        return redirect()->route('businessdashboard.businessinfo.index')->with('success', 'Business updated.');
    }

    public function Businessdestroy(Business $business)
    {
        $this->authorizeBusiness($business);

        if ($business->logo) Storage::disk('public')->delete($business->logo);
        if ($business->banner) Storage::disk('public')->delete($business->banner);

        $business->delete();

        return redirect()->route('businessdashboard.businessinfo.index')->with('success', 'Business deleted.');
    }

    public function Business_detail(Business $business)
    {
        $this->authorizeBusiness($business);
        return view('businessdashboard.businessinfo.businessdetail', compact('business'));
    }

    private function authorizeBusiness(Business $business)
    {
        if ($business->user_id !== auth()->id()) {
            abort(403);
        }
    }
}