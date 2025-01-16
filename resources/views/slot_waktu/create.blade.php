<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Slot Waktu</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center">
  <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-lg">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Tambah Slot Waktu</h1>
    <form action="{{ route('slot_waktu.store') }}" method="POST" class="space-y-6">
      @csrf
      <!-- Start Time -->
      <div>
        <label for="start_time" class="block text-sm font-medium text-gray-700">Start Time</label>
        <input type="time" id="start_time" name="start_time" required
               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
      </div>

      <!-- End Time -->
      <div>
        <label for="end_time" class="block text-sm font-medium text-gray-700">End Time</label>
        <input type="time" id="end_time" name="end_time" required
               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
      </div>

      <!-- Availability -->
      <div class="flex items-center">
        <input type="checkbox" id="is_available" name="is_available" value="1"
               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
        <label for="is_available" class="ml-2 block text-sm text-gray-700">Available</label>
      </div>

      <!-- Buttons -->
      <div class="flex justify-end space-x-4">
        <a href="{{ route('slot_waktu.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-medium px-4 py-2 rounded-md">
          Batal
        </a>
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-medium px-4 py-2 rounded-md">
          Simpan
        </button>
      </div>
    </form>
  </div>
</body>
</html>
