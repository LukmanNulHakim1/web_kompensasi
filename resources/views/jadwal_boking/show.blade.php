<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Jadwal Boking</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

  <!-- Container Utama -->
  <div class="min-h-screen flex items-center justify-center px-4">
    <div class="max-w-4xl w-full bg-white rounded-lg shadow-md p-8">

      <!-- Header -->
      <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800 border-b pb-4">Detail Jadwal Boking</h1>
      </div>

      <!-- Detail Data -->
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-8">
        <div class="border-b sm:border-0 pb-4 sm:pb-0">
          <p class="text-gray-500 font-medium">User</p>
          <p class="text-gray-900 text-lg font-semibold">{{ $jadwal->user->name }}</p>
        </div>
        <div class="border-b sm:border-0 pb-4 sm:pb-0">
          <p class="text-gray-500 font-medium">Labor</p>
          <p class="text-gray-900 text-lg font-semibold">{{ $jadwal->labor->name }}</p>
        </div>
        <div class="border-b sm:border-0 pb-4 sm:pb-0">
          <p class="text-gray-500 font-medium">Slot Waktu</p>
          <p class="text-gray-900 text-lg font-semibold">{{ $jadwal->slotWaktu->start_time }} - {{ $jadwal->slotWaktu->end_time }}</p>
        </div>
        <div class="border-b sm:border-0 pb-4 sm:pb-0">
          <p class="text-gray-500 font-medium">Tanggal</p>
          <p class="text-gray-900 text-lg font-semibold">{{ $jadwal->date }}</p>
        </div>
        <div class="sm:col-span-2">
          <p class="text-gray-500 font-medium">Status</p>
          <p class="inline-block px-4 py-1 text-sm font-semibold rounded-full {{ $jadwal->status == 'confirmed' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
            {{ ucfirst($jadwal->status) }}
          </p>
        </div>
      </div>

      <!-- Tombol -->
      <div class="flex justify-end">
        <a href="{{ route('jadwal_boking.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-medium px-6 py-2 rounded-md shadow-sm">
          Kembali ke Daftar Jadwal
        </a>
      </div>
    </div>
  </div>

</body>
</html>
