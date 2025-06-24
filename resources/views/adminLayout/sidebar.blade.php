<!-- Sidebar -->
<aside class="fixed top-0 left-0 h-full w-64 bg-white shadow-lg flex flex-col z-50">
  <!-- Profile Section -->

<div class="p-6 border-b">
  @foreach($users as $user)
    <a href="{{ route('profile.edit,$user->id') }}" class="flex items-center gap-3 mb-4">
      <img
        src="{{ $user->profile_photo_path ? asset('storage/' . $user->profile_photo_path) : 'https://i.pravatar.cc/40?u=' . $user->id }}"
        class="w-10 h-10 rounded-full object-cover"
        alt="Profile"
      >
      <div>
        <p class="text-sm font-medium text-gray-800">{{ $user->name }}</p>
        <p class="text-xs text-gray-500">{{ $user->email }}</p>
      </div>
    </a>
  @endforeach
</div>


    <!-- Admin Title -->
    <h1 class="text-2xl font-bold text-red-600">Admin</h1>
  </div>
  <nav class="flex-1 px-4 py-6 space-y-2 text-gray-700">
    <a href="#" data-tab="dashboard"
      class="tab-link flex items-center gap-3 px-4 py-2 rounded bg-red-100 text-red-600 font-semibold">
      <i class="fa-solid fa-chart-line"></i> Dashboard
    </a>
    <a href="#" data-tab="users"
      class="tab-link flex items-center gap-3 px-4 py-2 rounded hover:bg-red-100 hover:text-red-600">
      <i class="fa-solid fa-users"></i> Users
    </a>
    <a href="#" data-tab="businesses"
      class="tab-link flex items-center gap-3 px-4 py-2 rounded hover:bg-red-100 hover:text-red-600">
      <i class="fa-solid fa-store"></i> Businesses
    </a>
    <a href="#" data-tab="reviews"
      class="tab-link flex items-center gap-3 px-4 py-2 rounded hover:bg-red-100 hover:text-red-600">
      <i class="fa-solid fa-star"></i> Reviews
    </a>
    <a href="#" data-tab="reports"
      class="tab-link flex items-center gap-3 px-4 py-2 rounded hover:bg-red-100 hover:text-red-600">
      <i class="fa-solid fa-flag"></i> Reports
    </a>
    <a href="#" data-tab="settings"
      class="tab-link flex items-center gap-3 px-4 py-2 rounded hover:bg-red-100 hover:text-red-600">
      <i class="fa-solid fa-cog"></i> Settings
    </a>
  </nav>
  <div class="p-4 border-t">
    <button
      class="w-full text-left flex items-center gap-3 px-4 py-2 rounded hover:bg-red-100 hover:text-red-600 text-red-600 font-semibold">
      <i class="fa-solid fa-right-from-bracket"></i> Logout
    </button>
  </div>
</aside>