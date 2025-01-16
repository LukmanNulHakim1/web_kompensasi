<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <!-- Title and Subtitle -->
            <div>
                <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                    {{ __('Admin Labor') }}
                </h2>
                <p class="text-sm text-gray-500">Kelola data admin labor di sini</p>
            </div>

            <!-- Add Button -->
            <a href="{{ route('admin-labor.create') }}"
               class="inline-block bg-blue-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-600 transition duration-200">
                Tambah Admin Labor
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
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nama</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Labor</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Admin ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($adminLabors as $item)
                            <tr class="hover:bg-gray-100 transition duration-200">
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $item->name }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $item->email }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $item->labor->name }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $item->admin_id }}</td>
                                <td class="px-6 py-4 text-sm space-x-4">
                                    <a href="{{ route('admin-labor.edit', $item) }}"
                                       class="text-blue-500 hover:text-blue-700 transition duration-200">Edit</a>
                                    <a href="{{ route('admin-labor.show', $item) }}"
                                       class="text-green-500 hover:text-green-700 transition duration-200">Detail</a>
                                    <form action="{{ route('admin-labor.destroy', $item) }}" method="POST" class="inline-block">
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
                                <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">Tidak ada data admin labor</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
