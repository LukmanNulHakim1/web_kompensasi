<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buat Laporan Baru</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">

  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 class="text-4xl font-semibold text-gray-800 mb-8 text-center">Buat Laporan Baru</h1>

    <div class="bg-white shadow-xl rounded-lg p-8 border border-gray-200">
      <form action="{{ route('laporan.store') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Pilih User -->
        <div class="space-y-2">
          <label for="user_id" class="block text-sm font-medium text-gray-700">User</label>
          <select id="user_id" name="user_id" required class="mt-1 block w-full border-gray-300 rounded-md shadow-md focus:ring-blue-500 focus:border-blue-500 hover:border-blue-400">
            @foreach ($users as $user)
              <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
          </select>
        </div>

        <!-- Pilih Labor -->
        <div class="space-y-2">
          <label for="labor_id" class="block text-sm font-medium text-gray-700">Labor</label>
          <select id="labor_id" name="labor_id" required class="mt-1 block w-full border-gray-300 rounded-md shadow-md focus:ring-blue-500 focus:border-blue-500 hover:border-blue-400">
            @foreach ($labors as $labor)
              <option value="{{ $labor->id }}">{{ $labor->name }}</option>
            @endforeach
          </select>
        </div>

        <!-- Deskripsi -->
        <div class="space-y-2">
          <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
          <textarea id="description" name="description" rows="6" required class="mt-1 block w-full border-gray-300 rounded-md shadow-md focus:ring-blue-500 focus:border-blue-500 hover:border-blue-400"></textarea>
        </div>

        <!-- Tombol -->
        <div class="flex justify-end space-x-4">
          <a href="{{ route('laporan.index') }}" class="bg-gray-400 text-white px-6 py-3 rounded-md hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-400">
            Batal
          </a>
          <button type="submit" class="bg-indigo-500 text-white px-6 py-3 rounded-md hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-400">
            Simpan
          </button>
        </div>
      </form>
    </div>
  </div>

</body>
</html>
