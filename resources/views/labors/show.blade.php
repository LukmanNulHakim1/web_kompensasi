<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Labor</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center">
  <div class="bg-white shadow-lg rounded-lg w-full max-w-3xl p-8">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Detail Labor</h1>

    <table class="w-full table-auto border-collapse mb-6">
      <tr class="border-b">
        <th class="text-left text-gray-700 font-medium py-2 px-4">Nama</th>
        <td class="text-gray-700 py-2 px-4">{{ $labor->name }}</td>
      </tr>
      <tr class="border-b">
        <th class="text-left text-gray-700 font-medium py-2 px-4">Lokasi</th>
        <td class="text-gray-700 py-2 px-4">{{ $labor->location }}</td>
      </tr>
      <tr class="border-b">
        <th class="text-left text-gray-700 font-medium py-2 px-4">Kapasitas</th>
        <td class="text-gray-700 py-2 px-4">{{ $labor->capacity }}</td>
      </tr>
      <tr class="border-b">
        <th class="text-left text-gray-700 font-medium py-2 px-4">Deskripsi</th>
        <td class="text-gray-700 py-2 px-4">{{ $labor->description }}</td>
      </tr>
      <tr class="border-b">
        <th class="text-left text-gray-700 font-medium py-2 px-4">Fasilitas</th>
        <td class="text-gray-700 py-2 px-4">{{ $labor->facilities }}</td>
      </tr>
      <tr class="border-b">
        <th class="text-left text-gray-700 font-medium py-2 px-4">Foto</th>
        <td class="text-gray-700 py-2 px-4">
          @if ($labor->photo)
            <img src="{{ asset($labor->photo) }}" alt="Foto Labor" class="w-48 h-48 object-cover rounded-lg border border-gray-300">
          @else
            <span class="text-gray-500">Tidak ada foto</span>
          @endif
        </td>
      </tr>
    </table>

    <a href="{{ route('labors.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-medium px-4 py-2 rounded-md">Kembali</a>
  </div>
</body>
</html>
