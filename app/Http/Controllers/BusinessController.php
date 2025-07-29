<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Notifications\BusinessApproved;
use Illuminate\Support\Facades\Notification; 
use App\Notifications\BusinessPending;
use App\Notifications\BusinessSuspended;

class BusinessController extends Controller {
    public function index() {
        $businesses = Business::with( 'user' )->orderByDesc( 'created_at' )->paginate( 15 );
        return view( 'admin.businesses.index', compact( 'businesses' ) );
    }

    public function create() {
        $users = User::all();
        return view( 'admin.businesses.editdelete', [
            'business' => new Business(),
            'users' => $users,
        ] );
    }

    public function store( Request $request ) {
        $data = $request->validate( [
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
        ] );

        $data[ 'categories' ] = json_encode( array_map( 'trim', explode( ',', $data[ 'categories' ] ) ) );

        Business::create( $data );

        return redirect()->route( 'admin.businesses.index' )->with( 'success', 'Business added successfully.' );
    }

    public function edit( Business $business ) {
        $users = User::all();
        return view( 'admin.businesses.editdelete', [
            'business' => $business,
            'users' => $users,
        ] );
    }

public function updateStatus(Request $request, $id)
{
    try {
        $business = Business::findOrFail($id);
        $newStatus = $request->input('status');

        $business->status = $newStatus;
        $business->save();

        if ($business->user && $business->user->email) {
            if ($newStatus === 'approved') {
                $business->user->notify(new BusinessApproved($business));
            } elseif ($newStatus === 'pending') {
                $business->user->notify(new BusinessPending($business));
            } elseif ($newStatus === 'suspended') {
                $business->user->notify(new BusinessSuspended($business));
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Status updated and email sent.'
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => $e->getMessage()
        ], 500);
    }
}



    public function destroy( Business $business ) {
        $business->delete();
        return redirect()->route( 'admin.businesses.index' )->with( 'success', 'Business deleted successfully.' );
    }

    public function searchOrAdd( Request $request ) {
        $businessName = $request->query( 'business_name' );
        $business = Business::where( 'business_name', 'like', "%{$businessName}%" )->first();

        return view( 'addbusiness', [
            'business_name' => $business ? $business->business_name : $businessName,
            'business' => $business,
        ] );
    }

    public function storeDetail( Request $request ) {
        $request->validate( [
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
        ] );

        $business = new Business();
        $business->user_id = auth()->id();
        $business->province = $request->province;
        $business->business_name = $request->business_name;
        $business->address1 = $request->address1;
        $business->address2 = $request->address2;
        $business->city = $request->city;
        $business->postal_code = $request->postal_code;
        $business->phone = $request->phone;
        $business->web_address = $request->web_address;
        $business->email = $request->email;
        $business->categories = json_encode( $request->categories );
        $business->status = 'pending';
        // default status

        $business->save();

        return redirect()->back()->with( 'success', 'Business added successfully!' );
    }

    public function Repairs() {
        return view( 'project.repair' );
    }

    public function Businessdetail($id)
{
    $business = Business::with('reviews')->findOrFail($id);
    return view('businessdetail', compact('business'));
}


    public function Seemorephoto() {
        
        return view( 'seemorebusinessdetail');
    }

    public function businesssphoto() {
        return view( 'addphoto' );
    }

    public function Blogin() {
        return view( 'businesform.Businesform' );
    }

    public function dashboard() {
    $ratingCounts = DB::table('reviews')
        ->select('rating', DB::raw('count(*) as total'))
        ->groupBy('rating')
        ->orderBy('rating')
        ->get();

    $ratings = $ratingCounts->pluck('rating');   // [1, 2, 3, 4, 5]
    $totals = $ratingCounts->pluck('total');     // [3, 8, 15, 10, 4]

    return view('businessdashboard.dashboard', [
        'ratings' => $ratings,
        'ratingTotals' => $totals,
        'totalRatingCount' => $ratingCounts->sum('total'), // 👈 Add this line
        'recentReviews' => Review::with(['user', 'business'])->latest()->take(5)->get(),
        'totalReviews' => Review::count(),
    ]);
}


    //business controller of all business CRUD Operation
    // List all businesses for logged-in user

    public function Businessindex() {
       
        $businesses = Business::where( 'user_id', auth()->id() )->get();
        //dd(auth()->id());
        // dd( $businesses );

        return view( 'businessdashboard.businessinfo.index', compact( 'businesses' ) );
    }

    // Show the form to create a new business

    public function Businesscreate() {
        return view( 'businessdashboard.businessinfo.create' );
    }

    // Store new business in DB

    public function Businessstore( Request $request ) {
        $validated = $this->validateBusiness( $request );
        $validated[ 'user_id' ] = auth()->id();

        if ( $request->hasFile( 'logo' ) ) {
            $validated[ 'logo' ] = $request->file( 'logo' )->store( 'logos', 'public' );
        }

        if ( $request->hasFile( 'banner' ) ) {
            $validated[ 'banner' ] = $request->file( 'banner' )->store( 'banners', 'public' );
        }

        Business::create( $validated );

        return redirect()->route( 'businessdashboard.businessinfo.index' )
        ->with( 'success', 'Business created successfully.' );
    }

    // Show details of a single business

    public function Businessshow( Business $business ) {
        $this->authorizeOwner( $business );

        return view( 'businessdashboard.businessinfo.show', compact( 'business' ) );
    }

    // Show the edit form for a business

    public function Businessedit( Business $business ) {
        $this->authorizeOwner( $business );

        return view( 'businessdashboard.businessinfo.edit', compact( 'business' ) );
    }

    // Update business in DB

    public function Businessupdate( Request $request, Business $business ) {
        $validated = $request->validate( [
            'business_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'province' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address1' => 'required|string|max:255',
            'address2' => 'nullable|string|max:255',
            'postal_code' => 'required|string|max:20',
            'phone' => 'required|string|max:20',
            'web_address' => 'nullable|url',
            'email' => 'nullable|email',
            'categories' => 'nullable|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',

        ] );

        // Handle logo upload
        if ( $request->hasFile( 'logo' ) ) {
            if ( $business->logo && Storage::exists( $business->logo ) ) {
                Storage::delete( $business->logo );
            }
            $validated[ 'logo' ] = $request->file( 'logo' )->store( 'logos', 'public' );
        }

        // Handle banner upload
        if ( $request->hasFile( 'banner' ) ) {
            if ( $business->banner && Storage::exists( $business->banner ) ) {
                Storage::delete( $business->banner );
            }
            $validated[ 'banner' ] = $request->file( 'banner' )->store( 'banners', 'public' );
        }

        $business->update( $validated );

        return redirect()->route( 'businessdashboard.businessinfo.index' )
        ->with( 'success', 'Business updated successfully.' );
    }

    // Delete a business

    public function Businessdestroy( Business $business ) {
        $this->authorizeOwner( $business );

        if ( $business->logo ) {
            Storage::disk( 'public' )->delete( $business->logo );
        }

        if ( $business->banner ) {
            Storage::disk( 'public' )->delete( $business->banner );
        }

        $business->delete();

        return redirect()->route( 'businessdashboard.businessinfo.index' )
        ->with( 'success', 'Business deleted successfully.' );
    }

    // Authorization: only owner can access

    private function authorizeOwner( Business $business ) {
        if ( $business->user_id !== auth()->id() ) {
            abort( 403, 'Unauthorized access.' );
        }
    }

    // Validation rules for create/update

    private function validateBusiness( Request $request ): array {
        return $request->validate( [
            'business_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'province' => 'required|string',
            'city' => 'required|string',
            'address1' => 'required|string',
            'address2' => 'nullable|string',
            'postal_code' => 'required|string|max:10',
            'phone' => 'required|string|max:20',
            'web_address' => 'nullable|url',
            'email' => 'nullable|email',
            'categories' => 'nullable|string',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'banner' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ] );
    }

   public function search(Request $request)
{
    $query = Business::query();

    // Filter by business name if provided
    if ($request->filled('name')) {
        $query->where('business_name', 'like', '%' . $request->name . '%');
    }

    // Filter by city OR province matching the single 'location' input
    if ($request->filled('location')) {
        $location = $request->location;

        $query->where(function ($q) use ($location) {
            $q->where('city', 'like', '%' . $location . '%')
              ->orWhere('province', 'like', '%' . $location . '%');
        });
    }

    $businesses = $query->get();

    return view('resturant.Takeout', compact('businesses'));
}


}