<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Jadwal Boking</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center">
  <div class="bg-white shadow-lg rounded-lg w-full max-w-2xl p-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Tambah Jadwal Boking</h1>

    <form action="{{ route('jadwal_boking.store') }}" method="POST" class="space-y-6">
      @csrf

      <!-- User -->
      <div>
        <label for="user_id" class="block text-sm font-medium text-gray-700">User</label>
        <select id="user_id" name="user_id" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
          @foreach ($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
          @endforeach
        </select>
      </div>

      <!-- Labor -->
      <div>
        <label for="labor_id" class="block text-sm font-medium text-gray-700">Labor</label>
        <select id="labor_id" name="labor_id" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
          @foreach ($labors as $labor)
            <option value="{{ $labor->id }}">{{ $labor->name }}</option>
          @endforeach
        </select>
      </div>

      <!-- Slot Waktu -->
      <div>
        <label for="slot_waktu_id" class="block text-sm font-medium text-gray-700">Slot Waktu</label>
        <select id="slot_waktu_id" name="slot_waktu_id" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
          @foreach ($slotWaktus as $slot)
            <option value="{{ $slot->id }}">{{ $slot->start_time }} - {{ $slot->end_time }}</option>
          @endforeach
        </select>
      </div>

      <!-- Date -->
      <div>
        <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
        <input type="date" id="date" name="date" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
      </div>

      <!-- Status -->
      <div>
        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
        <select id="status" name="status" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
          <option value="pending">Pending</option>
          <option value="approved">Approved</option>
          <option value="rejected">Rejected</option>
        </select>
      </div>

      <!-- Buttons -->
      <div class="flex justify-end space-x-4">
        <a href="{{ route('jadwal_boking.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-medium px-4 py-2 rounded-md">
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
