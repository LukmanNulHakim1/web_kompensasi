<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Labor</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center">
  <div class="bg-white shadow-lg rounded-lg w-full max-w-3xl p-8">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Tambah Labor</h1>
    <form action="{{ route('labors.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <!-- Nama -->
      <div class="mb-4">
        <label for="name" class="block text-gray-700 font-medium mb-2">Nama</label>
        <input type="text" name="name" id="name" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" value="{{ old('name') }}" required>
      </div>

      <!-- Lokasi -->
      <div class="mb-4">
        <label for="location" class="block text-gray-700 font-medium mb-2">Lokasi</label>
        <input type="text" name="location" id="location" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" value="{{ old('location') }}" required>
      </div>

      <!-- Kapasitas -->
      <div class="mb-4">
        <label for="capacity" class="block text-gray-700 font-medium mb-2">Kapasitas</label>
        <input type="number" name="capacity" id="capacity" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" value="{{ old('capacity') }}" required>
      </div>

      <!-- Deskripsi -->
      <div class="mb-4">
        <label for="description" class="block text-gray-700 font-medium mb-2">Deskripsi</label>
        <textarea name="description" id="description" rows="4" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required>{{ old('description') }}</textarea>
      </div>

      <!-- Fasilitas -->
      <div class="mb-4">
        <label for="facilities" class="block text-gray-700 font-medium mb-2">Fasilitas</label>
        <small class="text-gray-500">Pisahkan fasilitas dengan koma (misalnya: AC, Proyektor, Meja)</small>
        <textarea name="facilities" id="facilities" rows="4" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required>{{ old('facilities') }}</textarea>
      </div>

      <!-- Foto -->
      <div class="mb-6">
        <label for="photo" class="block text-gray-700 font-medium mb-2">Foto</label>
        <input type="file" name="photo" id="photo" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
      </div>

      <!-- Tombol -->
      <div class="flex items-center justify-end space-x-4">
        <a href="{{ route('labors.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-medium px-4 py-2 rounded-md">Batal</a>
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-medium px-4 py-2 rounded-md">Simpan</button>
      </div>
    </form>
  </div>
</body>
</html>
