@extends('layouts.landing')

@section('content')
<div class="bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="pt-40 pb-16">
            <main>
                <div class="flex flex-col md:flex-row -mx-4">

                    {{-- Kolom Gambar Produk --}}
                    <div class="md:w-1/2 px-4">
                        <div class="h-auto md:h-[460px] rounded-lg bg-gray-100 mb-4 overflow-hidden shadow-lg border">
                            @if($product->image)
                                <img class="w-full h-full object-cover" src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}">
                            @else
                                <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                    <span class="text-gray-500">Gambar tidak tersedia</span>
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- Kolom Informasi Produk --}}
                    <div class="md:w-1/2 px-4">

                        {{-- Nama Produk + Status --}}
                        <div class="flex flex-wrap items-center gap-3 mb-4">
                            <h2 class="text-3xl font-bold text-gray-800">{{ $product->name }}</h2>
                            <span class="text-sm font-medium bg-green-100 text-green-800 px-2 py-1 rounded-full">
                                Tersedia
                            </span>

                            {{-- Produk Unggulan --}}
                            @if($product->is_featured)
                                <span class="text-sm font-medium bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full">
                                    ⭐ Produk Unggulan
                                </span>
                            @endif
                        </div>

                        {{-- Harga --}}
                        <div class="mb-4">
                            <span class="text-3xl font-bold text-green-600">
                                Rp{{ number_format($product->price, 0, ',', '.') }}
                            </span>
                        </div>

                        <div class="border-b border-gray-200 mb-4"></div>

                        {{-- Penjual --}}
                        <div class="flex items-center mb-4 text-sm">
                            <span class="font-bold text-gray-700 mr-2">Penjual:</span>
                            <span class="text-gray-600">{{ $product->seller }}</span>
                        </div>

                        {{-- Deskripsi --}}
                        <div class="mb-4">
                            <span class="font-bold text-gray-700">Deskripsi:</span>
                            <p class="text-gray-600 text-sm mt-2 leading-relaxed">
                                {{ $product->description }}
                            </p>
                        </div>

                        {{-- Kategori --}}
                        <div class="mb-2 text-sm">
                            <span class="font-bold text-gray-700">Kategori:</span>
                            <span class="text-gray-600 ml-2">{{ $product->category->name ?? 'Tidak ada kategori' }}</span>
                        </div>

                        {{-- Tag --}}
                        <div class="mb-4 text-sm">
                            <span class="font-bold text-gray-700">Tag:</span>
                            <span class="text-gray-600 ml-2">{{ $product->tags }}</span>
                        </div>

                        {{-- Tombol Aksi --}}
                        <div class="flex flex-col sm:flex-row -mx-2 mt-6">
                            <div class="w-full sm:w-1/2 px-2 mb-3 sm:mb-0">
                                <a href="{{ $product->shoppee }}" target="_blank" 
                                   class="w-full bg-[#fd5f32] text-white py-3 px-4 rounded-lg font-bold hover:bg-[#e85223] flex items-center justify-center transition duration-300 shadow-md">
                                    <img src="{{ asset('images/shopee.png') }}" alt="Shopee" class="h-5 w-5 mr-2">
                                    Pesan Sekarang
                                </a>
                            </div>
                            <div class="w-full sm:w-1/2 px-2">
                                <a href="https://wa.me/{{ $product->whatsapp }}" target="_blank" 
                                   class="w-full bg-green-500 text-white py-3 px-4 rounded-lg font-bold hover:bg-green-600 flex items-center justify-center transition duration-300 shadow-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp mr-2" viewBox="0 0 16 16">
                                        <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                                    </svg>
                                    Hubungi Penjual
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </main>

            {{-- Produk Lainnya --}}
            @if($relatedProducts->isNotEmpty())
                <section class="pt-12">
                    <div class="max-w-7xl mx-auto">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6">Produk Lainnya</h2>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                            @foreach($relatedProducts as $relatedProduct)
                                <a href="{{ route('katalog.show', $relatedProduct->slug) }}" 
                                   class="block bg-white rounded-lg shadow-md p-4 border hover:shadow-xl transition duration-300">
                                    <div class="w-full h-40 bg-gray-200 rounded-md mb-4 overflow-hidden">
                                        <img class="w-full h-full object-cover" src="{{ Storage::url($relatedProduct->image) }}" alt="{{ $relatedProduct->name }}">
                                    </div>
                                    <h3 class="font-bold text-gray-800 truncate">{{ $relatedProduct->name }}</h3>
                                    <p class="text-green-600 font-semibold">
                                        Rp{{ number_format($relatedProduct->price, 0, ',', '.') }}
                                    </p>
                                    @if($relatedProduct->is_featured)
                                        <span class="mt-1 inline-block text-xs bg-yellow-100 text-yellow-800 px-2 py-0.5 rounded-full">
                                            ⭐ Unggulan
                                        </span>
                                    @endif
                                </a>
                            @endforeach
                        </div>
                    </div>
                </section>
            @endif
        </div>
    </div>

    {{-- Footer --}}
    <footer class="bg-[#00923F] text-white py-4">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-4">
                <a href="" class="text-white text-decoration-none">
                    <img src="{{ asset('images/logo.png') }}" alt="Banjarsari" class="logo-img" style="height: 45px; width: auto; object-fit: contain;">
                </a>
                <div class="d-flex gap-4">
                    <a href="" class="text-white text-decoration-none hover:text-white/80 transition-colors duration-300">Privacy Policy</a>
                    <a href="" class="text-white text-decoration-none hover:text-white/80 transition-colors duration-300">Hubungi Kami</a>
                </div>
            </div>
            <div class="text-white/80">
                © {{ date('Y') }} Banjarsari. All Rights Reserved.
            </div>
        </div>
    </footer>
</div>
@endsection
