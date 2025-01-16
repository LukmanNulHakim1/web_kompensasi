<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Adminlabor</title>
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
        <!-- Navigation Links - Diletakkan di tengah -->
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
        <!-- User Profile and Logout -->
        <div class="flex items-center space-x-6">
          <a href="{{ route('admin_labor.profile') }}" class="text-gray-700 hover:text-gray-900 font-medium">Profil</a>
          <a href="{{ route('adminlabor.login') }}" class="text-red-600 hover:text-red-800 font-medium">Logout</a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Dashboard Adminlabor</h1>

    <!-- Statistik Cepat -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
      <!-- Total User -->
      <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col items-center">
        <h2 class="text-sm font-medium text-gray-600">Total User</h2>
        <p class="text-3xl font-semibold text-indigo-600">{{ $totalUsers }}</p>
      </div>

      <!-- Total Labor -->
      <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col items-center">
        <h2 class="text-sm font-medium text-gray-600">Total Labor</h2>
        <p class="text-3xl font-semibold text-green-600">{{ $totalLabors }}</p>
      </div>

      <!-- Jadwal Aktif -->
      <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col items-center">
        <h2 class="text-sm font-medium text-gray-600">Jadwal Boking Aktif</h2>
        <p class="text-3xl font-semibold text-blue-600">{{ $jadwalAktif }}</p>
      </div>

      <!-- Jadwal Pending -->
      <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col items-center">
        <h2 class="text-sm font-medium text-gray-600">Jadwal Boking Pending</h2>
        <p class="text-3xl font-semibold text-yellow-600">{{ $jadwalPending }}</p>
      </div>
    </div>

    <!-- Grafik -->
    <div class="bg-white shadow-lg rounded-lg p-6 mt-8">
      <h2 class="text-sm font-medium text-gray-600 mb-4">Jumlah Boking per Bulan</h2>
      <canvas id="bookingChart"></canvas>
    </div>
  </div>

  <!-- Script untuk Grafik -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    const ctx = document.getElementById('bookingChart').getContext('2d');
    const bookingChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: @json($months), // ['Jan', 'Feb', 'Mar', ...]
        datasets: [{
          label: 'Jumlah Boking',
          data: @json($bookingsPerMonth), // [10, 20, 30, ...]
          backgroundColor: 'rgba(54, 162, 235, 0.6)',
          borderColor: 'rgba(54, 162, 235, 1)',
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>

</body>
</html>
