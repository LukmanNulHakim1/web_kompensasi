<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Laporan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-3xl mx-auto p-6">
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-gray-800 tracking-wide">Detail Laporan</h1>
            <p class="text-gray-500 mt-2">Informasi lengkap tentang laporan Anda</p>
        </div>

        <div class="bg-white shadow-lg rounded-lg p-6">
            <div class="mb-6">
                <h2 class="text-lg font-semibold text-gray-700">Informasi Laporan</h2>
                <div class="border-t mt-2 pt-4">
                    <p class="text-gray-600 mb-2"><span class="font-medium">User:</span> {{ $laporan->user->name }}</p>
                    <p class="text-gray-600 mb-2"><span class="font-medium">Labor:</span> {{ $laporan->labor->name }}</p>
                    <p class="text-gray-600 mb-2"><span class="font-medium">Deskripsi:</span> {{ $laporan->description }}</p>
                </div>
            </div>

            <div class="mb-6">
                <h2 class="text-lg font-semibold text-gray-700">Waktu Laporan</h2>
                <div class="border-t mt-2 pt-4">
                    <p class="text-gray-600 mb-2"><span class="font-medium">Dibuat pada:</span> {{ $laporan->created_at->format('d M Y, H:i') }}</p>
                    <p class="text-gray-600"><span class="font-medium">Diperbarui pada:</span> {{ $laporan->updated_at->format('d M Y, H:i') }}</p>
                </div>
            </div>
        </div>

        <div class="mt-8 flex justify-center">
            <a href="{{ route('laporan.index') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-700 hover:shadow-lg transition-transform transform hover:scale-105">Kembali</a>
        </div>
    </div>
</body>
</html>
