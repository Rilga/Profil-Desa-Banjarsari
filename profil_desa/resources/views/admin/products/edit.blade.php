<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Produk: ') . $product->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if ($errors->any())
                        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">Oops!</strong>
                            <span class="block sm:inline">Ada beberapa masalah dengan input Anda.</span>
                            <ul class="mt-3 list-disc list-inside text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') {{-- Metode untuk update --}}
                        
                        <div class="space-y-6">
                            
                            <!-- Nama Produk -->
                            <div>
                                <x-input-label for="name" :value="__('Nama Produk')" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $product->name)" required />
                            </div>

                            <!-- Deskripsi -->
                            <div>
                                <x-input-label for="description" :value="__('Deskripsi')" />
                                <textarea id="description" name="description" rows="4" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('description', $product->description) }}</textarea>
                            </div>

                            <!-- Harga -->
                            <div>
                                <x-input-label for="price" :value="__('Harga')" />
                                <x-text-input id="price" name="price" type="number" class="mt-1 block w-full" :value="old('price', $product->price)" required />
                            </div>

                            <!-- Gambar Produk -->
                            <div>
                                <x-input-label for="image" :value="__('Gambar Produk (Opsional)')" />
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-32 h-32 object-cover rounded mb-4">
                                </div>
                                <input id="image" name="image" type="file" class="mt-1 block w-full text-sm text-gray-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-md file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-green-50 file:text-green-700
                                    hover:file:bg-green-100">
                                <p class="mt-1 text-sm text-gray-500">Kosongkan jika tidak ingin mengganti gambar.</p>
                            </div>

                            <!-- Tombol Aksi -->
                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Update Produk') }}</x-primary-button>
                                <a href="{{ route('admin.products.index') }}" class="text-sm text-gray-600 hover:text-gray-900">
                                    Batal
                                </a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
