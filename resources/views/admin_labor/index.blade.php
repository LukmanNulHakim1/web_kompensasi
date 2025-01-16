<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">

  <!-- Navbar -->
  <nav class="bg-white border-b border-gray-200 shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16 items-center">

        <!-- Logo -->
        <div class="flex items-center space-x-4">
          <a href="{{ route('admin.dashboard') }}" class="text-xl font-semibold text-gray-800">
            Logo
          </a>
        </div>

        <!-- Navigation Links -->
        <div class="hidden sm:flex sm:space-x-8">
          <a href="{{ route('adminlabor.dashboard') }}" class="text-gray-700 hover:text-gray-900 font-medium">
            Dashboard
          </a>
          <a href="{{ route('adminlabor.dashboard') }}" class="text-gray-700 hover:text-gray-900 font-medium">
            Labor
          </a>
          <a href="{{ route('adminlabor.dashboard') }}" class="text-gray-700 hover:text-gray-900 font-medium">
            Jadwal Boking
          </a>
          <a href="{{ route('adminlabor.dashboard') }}" class="text-gray-700 hover:text-gray-900 font-medium">
            Slot Waktu
          </a>
          <a href="{{ route('adminlabor.dashboard') }}" class="text-gray-700 hover:text-gray-900 font-medium">
            Laporan
          </a>

        </div>

        <!-- Profile Dropdown -->
        <div class="relative flex items-center">
          <button onclick="toggleDropdown()" class="flex items-center text-gray-700 hover:text-gray-900 font-medium px-4 py-2 rounded-md focus:outline-none">
            Admin
            <svg class="ml-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
          </button>

          <!-- Dropdown Menu -->
          <div id="dropdown" class="absolute right-0 mt-2 w-48 bg-white border border-gray-100 rounded-md shadow-lg hidden">
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
              Profile
            </a>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                Log Out
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <script>
    function toggleDropdown() {
      const dropdown = document.getElementById('dropdown');
      dropdown.classList.toggle('hidden');
    }
  </script>

</body>
</html>
