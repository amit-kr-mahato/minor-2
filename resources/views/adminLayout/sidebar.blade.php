  <!-- Sidebar -->
  <aside class="fixed top-0 left-0 h-screen w-64 bg-white shadow-lg flex flex-col">

    <div class="p-6 border-b flex items-center gap-3">
      <i class="fa-brands fa-yelp text-red-600 text-3xl"></i>
      <h1 class="text-2xl font-bold text-red-600">Yelp Admin</h1>
    </div>

    <nav class="flex-1 overflow-y-auto px-4 py-6 text-gray-700">

      <!-- Dashboard -->
      <a href="#dashboard" class="flex items-center gap-3 px-4 py-3 rounded hover:bg-red-100 hover:text-red-600 transition-colors font-semibold">
        <i class="fa-solid fa-chart-pie"></i>
        Dashboard
      </a>

      <!-- Users submenu -->
      <div x-data="{ open: false }" class="mt-4">
        <a
          href="#"
          @click.prevent="open = !open"
          class="flex items-center justify-between w-full px-4 py-3 rounded hover:bg-red-100 hover:text-red-600 transition-colors font-semibold"
        >
          <span class="flex items-center gap-3">
            <i class="fa-solid fa-users"></i> Users
          </span>
          <i :class="open ? 'fa-chevron-down' : 'fa-chevron-right'" class="fas"></i>
        </a>
        <div x-show="open" class="mt-2 ml-6 space-y-1 text-sm" style="display:none;">
          <a href="#manage-users" class="block px-3 py-2 rounded hover:bg-red-50 hover:text-red-600">Manage Users</a>
          <a href="#user-roles" class="block px-3 py-2 rounded hover:bg-red-50 hover:text-red-600">User Roles</a>
          <a href="#banned-users" class="block px-3 py-2 rounded hover:bg-red-50 hover:text-red-600">Banned Users</a>
        </div>
      </div>

      <!-- Businesses submenu -->
      <div x-data="{ open: false }" class="mt-4">
        <a
          href="#"
          @click.prevent="open = !open"
          class="flex items-center justify-between w-full px-4 py-3 rounded hover:bg-red-100 hover:text-red-600 transition-colors font-semibold"
        >
          <span class="flex items-center gap-3">
            <i class="fa-solid fa-store"></i> Businesses
          </span>
          <i :class="open ? 'fa-chevron-down' : 'fa-chevron-right'" class="fas"></i>
        </a>
        <div x-show="open" class="mt-2 ml-6 space-y-1 text-sm" style="display:none;">
          <a href="#manage-businesses" class="block px-3 py-2 rounded hover:bg-red-50 hover:text-red-600">Manage Businesses</a>
          <a href="#pending-approval" class="block px-3 py-2 rounded hover:bg-red-50 hover:text-red-600">Pending Approval</a>
        </div>
      </div>

      <!-- Reviews submenu -->
      <div x-data="{ open: false }" class="mt-4">
        <a
          href="#"
          @click.prevent="open = !open"
          class="flex items-center justify-between w-full px-4 py-3 rounded hover:bg-red-100 hover:text-red-600 transition-colors font-semibold"
        >
          <span class="flex items-center gap-3">
            <i class="fa-solid fa-star"></i> Reviews
          </span>
          <i :class="open ? 'fa-chevron-down' : 'fa-chevron-right'" class="fas"></i>
        </a>
        <div x-show="open" class="mt-2 ml-6 space-y-1 text-sm" style="display:none;">
          <a href="#manage-reviews" class="block px-3 py-2 rounded hover:bg-red-50 hover:text-red-600">Manage Reviews</a>
          <a href="#flagged-reviews" class="block px-3 py-2 rounded hover:bg-red-50 hover:text-red-600">Flagged Reviews</a>
        </div>
      </div>

      <!-- Reports submenu -->
      <div x-data="{ open: false }" class="mt-4">
        <a
          href="#"
          @click.prevent="open = !open"
          class="flex items-center justify-between w-full px-4 py-3 rounded hover:bg-red-100 hover:text-red-600 transition-colors font-semibold"
        >
          <span class="flex items-center gap-3">
            <i class="fa-solid fa-flag"></i> Reports
          </span>
          <i :class="open ? 'fa-chevron-down' : 'fa-chevron-right'" class="fas"></i>
        </a>
        <div x-show="open" class="mt-2 ml-6 space-y-1 text-sm" style="display:none;">
          <a href="#user-reports" class="block px-3 py-2 rounded hover:bg-red-50 hover:text-red-600">User Reports</a>
          <a href="#business-reports" class="block px-3 py-2 rounded hover:bg-red-50 hover:text-red-600">Business Reports</a>
          <a href="#review-reports" class="block px-3 py-2 rounded hover:bg-red-50 hover:text-red-600">Review Reports</a>
        </div>
      </div>

      <!-- Settings submenu -->
      <div x-data="{ open: false }" class="mt-4">
        <a
          href="#"
          @click.prevent="open = !open"
          class="flex items-center justify-between w-full px-4 py-3 rounded hover:bg-red-100 hover:text-red-600 transition-colors font-semibold"
        >
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

    </nav>

  </aside>