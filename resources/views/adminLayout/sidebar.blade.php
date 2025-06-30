<!-- Sidebar -->
<aside class="fixed top-0 left-0 h-screen w-64 bg-white shadow-lg flex flex-col">

  <div class="p-6 border-b flex items-center gap-4">
    <!-- Profile Image -->
    <a href="{{route('profile.edit')}}" class="pl-4">
      @php $user = auth()->user(); @endphp
      <img src="{{ $user->profile_photo_path
  ? asset('storage/' . $user->profile_photo_path)
  : 'https://i.pravatar.cc/40?u=' . $user->id }}" alt="Profile"
        class="w-12 h-12 rounded-full object-cover border border-gray-300 ">

      <!-- Name and Email -->
      <div>
        <h2 class="text-base font-semibold text-gray-800">{{ $user->name }}</h2>
        <p class="text-sm text-gray-500">{{$user->email }}</p>
      </div>
    </a>
  </div>


  <nav class="flex-1 overflow-y-auto px-4 py-6 text-gray-700">

    <!-- Dashboard -->
    <a href="{{route('admin.dashboard')}}"
      class="flex items-center gap-3 px-4 py-3 rounded hover:bg-red-100 hover:text-red-600 transition-colors font-semibold">
      <i class="fa-solid fa-chart-pie"></i>
      Dashboard
    </a>

    <!-- Users submenu -->
    <div x-data="{ open: false }" class="mt-4">
      <a href="#" @click.prevent="open = !open"
        class="flex items-center justify-between w-full px-4 py-3 rounded hover:bg-red-100 hover:text-red-600 transition-colors font-semibold">
        <span class="flex items-center gap-3">
          <i class="fa-solid fa-users"></i> Users
        </span>
        <i :class="open ? 'fa-chevron-down' : 'fa-chevron-right'" class="fas"></i>
      </a>
      <div x-show="open" class="mt-2 ml-6 space-y-1 text-sm" style="display:none;">
        <a href="{{route('admin.users.index')}}"
          class="block px-3 py-2 rounded hover:bg-red-50 hover:text-red-600">Manage Users</a>
          </div>
    </div>

    <!-- Businesses submenu -->
    <div x-data="{ open: false }" class="mt-4">
      <a href="#" @click.prevent="open = !open"
        class="flex items-center justify-between w-full px-4 py-3 rounded hover:bg-red-100 hover:text-red-600 transition-colors font-semibold">
        <span class="flex items-center gap-3">
          <i class="fa-solid fa-store"></i> Businesses
        </span>
        <i :class="open ? 'fa-chevron-down' : 'fa-chevron-right'" class="fas"></i>
      </a>
      <div x-show="open" class="mt-2 ml-6 space-y-1 text-sm" style="display:none;">
        <a href="{{route('admin.businesses.index')}}"
          class="block px-3 py-2 rounded hover:bg-red-50 hover:text-red-600">Manage Businesses</a>
      </div>
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
        <a href="{{route('admin.reviews.index')}}"
          class="block px-3 py-2 rounded hover:bg-red-50 hover:text-red-600">Manage Reviews</a>
      </div>
    </div>

    <!-- Reports submenu -->
    {{-- <div x-data="{ open: false }" class="mt-4">
      <a href="#" @click.prevent="open = !open"
        class="flex items-center justify-between w-full px-4 py-3 rounded hover:bg-red-100 hover:text-red-600 transition-colors font-semibold">
        <span class="flex items-center gap-3">
          <i class="fa-solid fa-flag"></i> Reports
        </span>
        <i :class="open ? 'fa-chevron-down' : 'fa-chevron-right'" class="fas"></i>
      </a>
      <div x-show="open" class="mt-2 ml-6 space-y-1 text-sm" style="display:none;">
        <a href="#user-reports" class="block px-3 py-2 rounded hover:bg-red-50 hover:text-red-600">User Reports</a>
        <a href="#business-reports" class="block px-3 py-2 rounded hover:bg-red-50 hover:text-red-600">Business
          Reports</a>
        <a href="#review-reports" class="block px-3 py-2 rounded hover:bg-red-50 hover:text-red-600">Review Reports</a>
      </div>
    </div> --}}

    <!-- Settings submenu -->
    <div x-data="{ open: false }" class="mt-4">
      <a href="#" @click.prevent="open = !open"
        class="flex items-center justify-between w-full px-4 py-3 rounded hover:bg-red-100 hover:text-red-600 transition-colors font-semibold">
        <span class="flex items-center gap-3">
          <i class="fa-solid fa-cog"></i> Settings
        </span>
        <i :class="open ? 'fa-chevron-down' : 'fa-chevron-right'" class="fas"></i>
      </a>
      <div x-show="open" class="mt-2 ml-6 space-y-1 text-sm" style="display:none;">
        <a href="#general-settings" class="block px-3 py-2 rounded hover:bg-red-50 hover:text-red-600">General</a>
        <a href="#email-settings" class="block px-3 py-2 rounded hover:bg-red-50 hover:text-red-600">Email</a>
        <a href="#security-settings" class="block px-3 py-2 rounded hover:bg-red-50 hover:text-red-600">Security</a>
      </div>
    </div>


    <!--logout-->
    <div x-data="{ open: false }" class="mt-4">
      <form method="POST" action="{{ route('logout') }}" @submit="open = false">
        @csrf
        <button type="submit"
          class="flex items-center justify-between w-full px-4 py-3 rounded hover:bg-red-100 hover:text-red-600 transition-colors font-semibold">
          <span class="flex items-center gap-3">
            <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
          </span>
        </button>
      </form>
    </div>


  </nav>

</aside>