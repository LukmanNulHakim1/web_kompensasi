<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jadwal Boking</title>
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

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Jadwal Boking</h1>

    <a href="{{ route('jadwal_boking.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-medium px-4 py-2 rounded-md mb-4 inline-block">
        Tambah Jadwal Boking
    </a>

    <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
      <table class="min-w-full table-auto border-collapse border border-gray-200">
        <thead class="bg-gray-100">
          <tr>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">User</th>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Labor</th>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Slot Waktu</th>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Date</th>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Status</th>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($jadwalBokings as $jadwal)
            <tr class="hover:bg-gray-50">
              <td class="px-6 py-4 text-sm text-gray-800">{{ $jadwal->user->name }}</td>
              <td class="px-6 py-4 text-sm text-gray-800">{{ $jadwal->labor->name }}</td>
              <td class="px-6 py-4 text-sm text-gray-800">{{ $jadwal->slotWaktu->start_time }} - {{ $jadwal->slotWaktu->end_time }}</td>
              <td class="px-6 py-4 text-sm text-gray-800">{{ $jadwal->date }}</td>
              <td class="px-6 py-4 text-sm text-gray-800">
                <span class="px-3 py-1 rounded-full text-sm {{ $jadwal->status == 'confirmed' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                  {{ ucfirst($jadwal->status) }}
                </span>
              </td>
              <td class="px-6 py-4 text-sm text-gray-800">
                <a href="{{ route('jadwal_boking.show', $jadwal->id) }}" class="text-green-500 hover:text-green-700 mr-4">Detail</a>
                <a href="{{ route('jadwal_boking.edit', $jadwal->id) }}" class="text-blue-500 hover:text-blue-700 mr-4">Edit</a>
                <form action="{{ route('jadwal_boking.destroy', $jadwal->id) }}" method="POST" class="inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" onclick="return confirm('Yakin ingin menghapus jadwal boking ini?')" class="text-red-500 hover:text-red-700">
                    Delete
                  </button>
                </form>
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
