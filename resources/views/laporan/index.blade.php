<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laporan</title>
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
        <div class="hidden sm:flex flex-grow justify-center space-x-8">
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
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Laporan</h1>

    <!-- Button Tambah -->
    <div class="mb-4">
      <a href="{{ route('laporan.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-medium px-4 py-2 rounded-md">
        Tambah Laporan
      </a>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
      <table class="min-w-full table-auto border-collapse border border-gray-200">
        <thead class="bg-gray-100">
          <tr>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">User</th>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Labor</th>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Description</th>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Date</th>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($laporans as $laporan)
            <tr class="hover:bg-gray-50">
              <td class="px-6 py-4 text-sm text-gray-800">{{ $laporan->user->name }}</td>
              <td class="px-6 py-4 text-sm text-gray-800">{{ $laporan->labor->name }}</td>
              <td class="px-6 py-4 text-sm text-gray-800">{{ $laporan->description }}</td>
              <td class="px-6 py-4 text-sm text-gray-800">{{ $laporan->created_at->format('Y-m-d H:i:s') }}</td>
              <td class="px-6 py-4 text-sm text-gray-800 flex items-center space-x-4">
                <!-- Detail -->
                <a href="{{ route('laporan.show', $laporan->id) }}" class="text-blue-500 hover:text-blue-700 font-medium">
                  Detail
                </a>
                <!-- Edit -->
                <a href="{{ route('laporan.edit', $laporan->id) }}" class="text-yellow-500 hover:text-yellow-700 font-medium">
                  Edit
                </a>
                <!-- Delete -->
                <form action="{{ route('laporan.destroy', $laporan->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus laporan ini?');" class="inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="text-red-500 hover:text-red-700 font-medium">
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

</body>
</html>
