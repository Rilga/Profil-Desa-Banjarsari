<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Katalog Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    {{-- HEADER & TOMBOL AKSI --}}
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
                        
                        {{-- Tombol Tambah Produk --}}
                        <a href="{{ route('user.products.create') }}" 
                           style="background-color: #22c55e; color: white; padding: 12px 24px; text-decoration: none; border-radius: 8px; font-weight: bold; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: background-color 0.2s;"
                           onmouseover="this.style.backgroundColor='#16a34a'"
                           onmouseout="this.style.backgroundColor='#22c55e'">
                            Tambah Produk Baru
                        </a>

                        {{-- Form Import & Tombol Download --}}
                        <div style="display: flex; align-items: center; gap: 12px;">
                            {{-- Form Import Excel --}}
                            <form action="{{ route('user.products.import') }}" method="POST" enctype="multipart/form-data" style="display: flex; align-items: center; gap: 8px;">
                                @csrf
                                <input type="file" name="file" accept=".xlsx,.xls" 
                                       style="border: 1px solid #d1d5db; border-radius: 6px; padding: 8px; font-size: 14px;" required>
                                <button type="submit" 
                                        style="background-color: #6366f1; color: white; padding: 8px 16px; border-radius: 6px; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05); transition: background-color 0.2s;"
                                        onmouseover="this.style.backgroundColor='#4f46e5'"
                                        onmouseout="this.style.backgroundColor='#6366f1'">
                                    Import Produk
                                </button>
                            </form>

                            {{-- Tombol Download Template --}}
                            <a href="{{ route('user.products.template.download') }}" 
                               style="background-color: #3b82f6; color: white; padding: 8px 16px; border-radius: 6px; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05); transition: background-color 0.2s;"
                               onmouseover="this.style.backgroundColor='#2563eb'"
                               onmouseout="this.style.backgroundColor='#3b82f6'">
                                Download Template
                            </a>
                        </div>
                    </div>
                    
                    {{-- ALERT MESSAGES --}}
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-200">
                                <tr>
                                    <th class="w-1/12 text-left py-3 px-4 uppercase font-semibold text-sm">#</th>
                                    <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Gambar</th>
                                    <th class="w-1/4 text-left py-3 px-4 uppercase font-semibold text-sm">Nama Produk</th>
                                    <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Kategori</th>
                                    <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Harga</th>
                                    <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Produk Unggulan</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                @forelse($products as $product)
                                <tr>
                                    <td class="text-left py-3 px-4">
                                        {{ $loop->iteration + ($products->currentPage() - 1) * $products->perPage() }}
                                    </td>
                                    <td class="text-left py-3 px-4">
                                        @if($product->image)
                                            <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="h-16 w-16 object-cover rounded">
                                        @else
                                            <span>No Image</span>
                                        @endif
                                    </td>
                                    <td class="text-left py-3 px-4">{{ $product->name }}</td>
                                    <td class="text-left py-3 px-4">{{ $product->category->name ?? 'N/A' }}</td>
                                    <td class="text-left py-3 px-4">Rp{{ number_format($product->price, 0, ',', '.') }}</td>
                                    <td class="text-left py-3 px-4">
                                        @if($product->is_featured)
                                            <span class="text-green-600 font-bold">✓</span>
                                        @else
                                            <span class="text-gray-400">✗</span>
                                        @endif
                                    </td>
                                    <td class="text-left py-3 px-4">
                                        <div class="flex">
                                            <a href="{{ route('user.products.edit', $product->id) }}" class="text-blue-500 hover:text-blue-700 mr-2">Edit</a>
                                            <form action="{{ route('user.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4">Tidak ada produk.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>