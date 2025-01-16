<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <!-- Title and Subtitle -->
            <div>
                <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                    {{ __('Kabupaten') }}
                </h2>
                <p class="text-sm text-gray-500">Kelola data kabupaten dan kota Anda di sini</p>
            </div>

            <!-- Add Button -->
            <a href="{{ route('kabupaten.create') }}"
               class="inline-block bg-blue-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-600 transition duration-200">
                <i class="fas fa-plus mr-2"></i> Tambah Kabupaten
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Menampilkan pesan flash jika ada -->
            @if(session('success'))
                <div class="bg-green-500 text-white p-4 rounded mb-6 shadow-md">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Tabel Data -->
            <div class="overflow-hidden bg-white shadow-md rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-blue-600 text-white">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Kabupaten/Kota</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Pusat Pemerintahan</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Pemimpin</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Luas Wilayah (km²)</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($kabupatens as $item)
                            <tr class="hover:bg-gray-100 transition duration-200">
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $item->kabupaten_kota }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $item->pusat_pemerintahan }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $item->bupati_walikota }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $item->luas_wilayah }}</td>
                                <td class="px-6 py-4 text-sm space-x-4">
                                    <a href="{{ route('kabupaten.edit', $item) }}"
                                       class="text-blue-500 hover:text-blue-700 transition duration-200">Edit</a>
                                    <a href="{{ route('kabupaten.show', $item) }}"
                                       class="text-green-500 hover:text-green-700 transition duration-200">Detail</a>
                                    <form action="{{ route('kabupaten.destroy', $item) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="text-red-500 hover:text-red-700 transition duration-200">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">Tidak ada data kabupaten</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
