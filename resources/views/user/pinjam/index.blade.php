<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                    {{ __('Labor') }}
                </h2>
                <p class="text-sm text-gray-500">Ini tampilan peminjaman labor</p>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex items-center mb-4">
                    <input type="text" placeholder="Cari Ruangan Lab" class="border border-gray-300 rounded-md px-4 py-2 w-full mr-2">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="bg-blue-200 rounded-lg p-4 text-center">LAB 1</div>
                    <div class="bg-blue-200 rounded-lg p-4 text-center">LAB 2</div>
                    <div class="bg-blue-200 rounded-lg p-4 text-center">LAB 3</div>
                    <div class="bg-blue-200 rounded-lg p-4 text-center">LAB 4</div>
                </div>

                <div class="mt-4 text-center">
                    <a href="#" class="text-blue-500">selengkapnya...</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
