@extends('layouts.landing')

@section('content')
<div class="max-w-6xl mx-auto px-4" style="padding-top: 120px;">
<div class="max-w-6xl mx-auto px-4" style="padding-top: 10px;">
    {{-- Filter & Search --}}
    <div class="flex flex-col md:flex-row gap-4 mb-12">
        <div class="w-full md:w-1/4">
            <select class="border border-gray-300 rounded-lg px-4 py-3 w-full focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                <option>Semua Kategori</option>
            </select>
        </div>
        <div class="flex w-full md:w-2/4">
            <input type="text" class="border border-gray-300 rounded-l-lg px-4 py-3 w-full focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="Cari Produk">
            <button class="bg-green-600 hover:bg-green-700 text-white px-12 rounded-r-lg transition-colors duration-200 font-medium whitespace-nowrap">
                Cari
            </button>
        </div>
    </div>

    {{-- Produk Grid - Horizontal 5 Products --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
        @php
        $produks = [
            [
                'nama' => 'Lombok Hijau',
                'harga' => 12000,
                'satuan' => '/kg',
                'gambar' => 'images/produk-1.png',
                'rating' => 4,
            ],
            [
                'nama' => 'Jagung Banjarsari',
                'harga' => 14900,
                'satuan' => '',
                'gambar' => 'images/produk-2.png',
                'rating' => 4,
            ],
            [
                'nama' => 'Apel Banjarsari',
                'harga' => 5000,
                'satuan' => '',
                'gambar' => 'images/produk-3.png',
                'rating' => 4,
            ],
        ];
        @endphp

        @foreach($produks as $produk)
        <div class="bg-white border rounded-xl shadow-lg p-4 flex flex-col items-center hover:shadow-xl transition-shadow duration-300">
            <div class="w-full h-48 mb-4 flex items-center justify-center">
                <img src="{{ asset($produk['gambar']) }}" alt="{{ $produk['nama'] }}" class="max-h-full max-w-full object-contain">
            </div>
            <div class="text-center w-full">
                <h3 class="font-semibold text-sm md:text-base mb-2 text-gray-800 line-clamp-2">{{ $produk['nama'] }}</h3>
                <div class="text-green-700 font-bold text-lg mb-2">
                    Rp{{ number_format($produk['harga'], 0, ',', '.') }}
                    @if($produk['satuan'])
                        <span class="text-sm text-gray-600">{{ $produk['satuan'] }}</span>
                    @endif
                </div>
                <div class="flex justify-center text-yellow-400 text-sm mb-3">
                    @for ($i = 1; $i <= 5; $i++)
                        {!! $i <= $produk['rating'] ? '★' : '☆' !!}
                    @endfor
                </div>
                <button class="w-full bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-lg text-sm font-medium transition-colors duration-200">
                    Tambah ke Keranjang
                </button>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Pagination --}}
    <div class="mt-12 flex justify-center items-center space-x-2">
        <button class="w-10 h-10 flex items-center justify-center border rounded-lg hover:bg-gray-50 transition-colors duration-200">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>
        
        <button class="w-10 h-10 bg-green-600 text-white rounded-lg font-medium">
            1
        </button>
        
        <button class="w-10 h-10 flex items-center justify-center border rounded-lg hover:bg-gray-50 transition-colors duration-200 font-medium">
            2
        </button>
        
        <button class="w-10 h-10 flex items-center justify-center border rounded-lg hover:bg-gray-50 transition-colors duration-200 font-medium">
            3
        </button>
        
        <button class="w-10 h-10 flex items-center justify-center border rounded-lg hover:bg-gray-50 transition-colors duration-200">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>
    </div>
</div>
@endsection