<!-- Sidebar -->
<aside class="fixed top-0 left-0 h-screen w-64 bg-white shadow-lg flex flex-col">


  @php $user = auth()->user(); @endphp

  @if($user)
    {{-- Show profile info --}}
    <div class="p-5 border-b flex items-center gap-1">
    <a href="{{ route('profile.Upload') }}" class=" flex-col flex ml-1 gap-2">
      <img src="{{ $user->profile_photo_path
    ? asset('storage/' . $user->profile_photo_path)
    : 'https://i.pravatar.cc/40?u=' . $user->id }}" alt="Profile"
      class="w-12 h-12 rounded-full object-cover border border-gray-300 ml-12">

      <div>
      <h2 class="text-base font-semibold text-gray-800">{{ $user->name }}</h2>
      <p class="text-sm text-gray-700">{{ $user->email }}</p>
      </div>
    </a>
    </div>
  @endif


  <nav class="flex-1 overflow-y-auto px-4 py-6 text-gray-800">

    <!-- Dashboard -->
    <a href="{{ route('businessdashboard.dashboard') }}"
      class="flex items-center gap-3 px-4 py-3 rounded hover:bg-red-100 hover:text-red-600 transition-colors font-semibold">
      <i class="fa-solid fa-chart-pie"></i>
      Dashboard
    </a>

    <!-- Businesses submenu -->
    <div x-data="{ open: false }" class="mt-4">
      <a href="#" @click.prevent="open = !open"
        class="flex items-center justify-between w-full px-4 py-3 rounded hover:bg-red-100 hover:text-red-600 transition-colors font-semibold">
        <span class="flex items-center gap-3">
          <i class="fa-solid fa-store"></i> Businesses
        </span>
        <i :class="open ? 'fa-chevron-down' : 'fa-chevron-right'" class="fas"></i>
      </a>
      <div x-show="open" class="mt-2 ml-6 space-y-1 text-sm" style="display: none;">
        <a href="{{ route('businessdashboard.businessinfo.index') }}"
          class="block px-3 py-2 rounded hover:bg-red-50 hover:text-red-600">My Businesses</a>

      </div>
    </div>

    <!-- Menu Item -->
    <div class="mt-4">
      <a href="{{ route('businessdashboard.menu.index') }}"
        class="flex items-center justify-between w-full px-4 py-3 rounded hover:bg-red-100 hover:text-red-600 transition-colors font-semibold">
        <span class="flex items-center gap-3">
          <i class="fa-solid fa-store"></i> Menu Management
        </span>
      </a>
    </div>

    <!-- Reviews submenu -->
    <div x-data="{ open: false }" class="mt-4">
      <a href="#" @click.prevent="open = !open"
        class="flex items-center justify-between w-full px-4 py-3 rounded hover:bg-red-100 hover:text-red-600 transition-colors font-semibold">
        <span class="flex items-center gap-3">
          <i class="fa-solid fa-star"></i> Reviews
        </span>
        <i :class="open ? 'fa-chevron-down' : 'fa-chevron-right'" class="fas"></i>
      </a>
      <div x-show="open" class="mt-2 ml-6 space-y-1 text-sm" style="display:none;">
        <a href="{{route('businessdashboard.reviews.index')}}"
          class="block px-3 py-2 rounded hover:bg-red-50 hover:text-red-600">Manage Reviews</a>
      </div>
    </div>

    <!-- Payment gateway -->
    <div class="mt-4">
      <a href="{{ route('businessdashboard.khalti.page') }}"
        class="flex items-center justify-between w-full px-4 py-3 rounded hover:bg-red-100 hover:text-red-600 transition-colors font-semibold">
        <span class="flex items-center gap-3">
          <i class="fa-solid fa-credit-card"></i> Payment Gateway
        </span>
      </a>
    </div>


    <!-- Logout -->
    <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit"
        class="flex items-center justify-between w-full px-4 py-3 rounded hover:bg-red-100 hover:text-red-600 transition-colors font-semibold">
        <span class="flex items-center gap-3">
            <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
        </span>
    </button>
</form>


  </nav>

</aside>