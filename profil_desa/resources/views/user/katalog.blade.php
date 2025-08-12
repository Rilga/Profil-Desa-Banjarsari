<x-app-layout>
    <div class="max-w-6xl mx-auto px-4" style="padding-top: 120px;">
    <div class="max-w-6xl mx-auto px-4" style="padding-top: 10px;">

        {{-- Filter & Search --}}
        <form method="GET" action="{{ route('katalog.index') }}" class="flex flex-col md:flex-row gap-4 mb-12">
            {{-- Dropdown Kategori --}}
            <div class="w-full md:w-1/4">
                <select name="category" class="border border-gray-300 rounded-lg px-4 py-3 w-full focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Input Pencarian --}}
            <div class="flex w-full md:w-2/4">
                <input type="text" name="search" value="{{ request('search') }}" class="border border-gray-300 rounded-l-lg px-4 py-3 w-full focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="Cari Produk">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-12 rounded-r-lg transition-colors duration-200 font-medium whitespace-nowrap">
                    Cari
                </button>
            </div>
        </form>

        {{-- Produk Unggulan --}}
        @if(isset($featuredProducts) && $featuredProducts->count())
            <h2 class="text-2xl font-bold mb-4">Produk Unggulan</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 mb-12">
                @foreach($featuredProducts as $product)
                    <a href="{{ route('katalog.show', $product->slug) }}" 
                       class="bg-white border rounded-xl shadow-lg p-4 flex flex-col items-center hover:shadow-xl transition-shadow duration-300 no-underline relative">
                        
                        {{-- Label Unggulan --}}
                        <span class="absolute top-2 left-2 bg-yellow-400 text-white text-xs font-bold px-2 py-1 rounded">
                            ⭐ Unggulan
                        </span>

                        <div class="w-full h-48 mb-4 flex items-center justify-center">
                            <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://placehold.co/400x400/e2e8f0/333333?text=No+Image' }}" 
                                 alt="{{ $product->name }}" 
                                 class="max-h-full max-w-full object-contain">
                        </div>
                        <div class="text-center w-full">
                            <h3 class="font-semibold text-sm md:text-base mb-2 text-gray-800 line-clamp-2">{{ $product->name }}</h3>
                            <div class="text-green-700 font-bold text-lg mb-2">
                                Rp{{ number_format($product->price, 0, ',', '.') }}
                            </div>
                            <div class="flex justify-center text-yellow-400 text-sm mb-3">
                                @for ($i = 1; $i <= 5; $i++)
                                    {!! $i <= 4 ? '★' : '☆' !!}
                                @endfor
                            </div>
                            <div class="w-full bg-green-600 text-white py-2 px-4 rounded-lg text-sm font-medium">
                                Lihat Detail
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif

        {{-- Produk Grid - Menggunakan data dari Controller --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
            @foreach($products as $product)
                <a href="{{ route('katalog.show', $product->slug) }}" class="bg-white border rounded-xl shadow-lg p-4 flex flex-col items-center hover:shadow-xl transition-shadow duration-300 no-underline">
                    <div class="w-full h-48 mb-4 flex items-center justify-center">
                        <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://placehold.co/400x400/e2e8f0/333333?text=No+Image' }}" alt="{{ $product->name }}" class="max-h-full max-w-full object-contain">
                    </div>
                    <div class="text-center w-full">
                        <h3 class="font-semibold text-sm md:text-base mb-2 text-gray-800 line-clamp-2">{{ $product->name }}</h3>
                        <div class="text-green-700 font-bold text-lg mb-2">
                            Rp{{ number_format($product->price, 0, ',', '.') }}
                        </div>
                        <div class="flex justify-center text-yellow-400 text-sm mb-3">
                            @for ($i = 1; $i <= 5; $i++)
                                {!! $i <= 4 ? '★' : '☆' !!}
                            @endfor
                        </div>
                        <div class="w-full bg-green-600 text-white py-2 px-4 rounded-lg text-sm font-medium">
                            Lihat Detail
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-12 flex justify-center items-center">
            {{ $products->links() }}
        </div>
    </div>
</x-app-layout>
