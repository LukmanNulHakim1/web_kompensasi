<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Slot Waktu</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 min-h-screen">

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
          <a href="{{ route('labors.index') }}" class="text-gray-700 hover:text-gray-900 font-medium">
            Labor
          </a>
          <a href="{{ route('jadwal_boking.index') }}" class="text-gray-700 hover:text-gray-900 font-medium">
            Jadwal Boking
          </a>
          <a href="{{ route('slot_waktu.index') }}" class="text-gray-700 hover:text-gray-900 font-medium">
            Slot Waktu
          </a>
          <a href="{{ route('laporan.index') }}" class="text-gray-700 hover:text-gray-900 font-medium">
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

  <!-- Content -->
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="bg-white shadow-lg rounded-lg p-6">
      <h1 class="text-2xl font-bold mb-6 text-gray-800">Slot Waktu</h1>

      <!-- Add Button -->
      <div class="flex justify-between mb-4">
        <a href="{{ route('slot_waktu.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-medium px-4 py-2 rounded-md">
          Tambah Slot Waktu
        </a>
      </div>

      <!-- Table -->
      <table class="w-full table-auto border-collapse border border-gray-200">
        <thead>
          <tr class="bg-gray-100 text-gray-800">
            <th class="border border-gray-200 py-2 px-4 text-left">Start Time</th>
            <th class="border border-gray-200 py-2 px-4 text-left">End Time</th>
            <th class="border border-gray-200 py-2 px-4 text-left">Status</th>
            <th class="border border-gray-200 py-2 px-4 text-left">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($slotWaktus as $slot)
            <tr class="text-gray-700 hover:bg-gray-50">
              <td class="border border-gray-200 py-2 px-4">{{ $slot->start_time }}</td>
              <td class="border border-gray-200 py-2 px-4">{{ $slot->end_time }}</td>
              <td class="border border-gray-200 py-2 px-4">
                <span class="px-3 py-1 rounded-full text-sm {{ $slot->is_available ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                  {{ $slot->is_available ? 'Available' : 'Not Available' }}
                </span>
              </td>
              <td class="border border-gray-200 py-2 px-4">
                <div class="flex items-center space-x-2">
                  <a href="{{ route('slot_waktu.edit', $slot->id) }}"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white font-medium px-3 py-1 rounded-md">
                    Edit
                  </a>
                  <form action="{{ route('slot_waktu.destroy', $slot->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            onclick="return confirm('Yakin ingin menghapus slot waktu ini?')"
                            class="bg-red-500 hover:bg-red-600 text-white font-medium px-3 py-1 rounded-md">
                      Delete
                    </button>
                  </form>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <script>
    function toggleDropdown() {
      const dropdown = document.getElementById('dropdown');
      dropdown.classList.toggle('hidden');
    }
  </script>
</body>
</html>
