@extends('layouts.landing')

@section('content')

<section class="bg-gradient-to-br from-green-100 to-white py-16 px-4">
    <br><br><br><br>
    <div class="max-w-5xl mx-auto bg-white shadow-lg rounded-xl overflow-hidden">

        <!-- Gambar Cover -->
        <img src="{{ asset('storage/' . $konten->cover) }}" alt="{{ $konten->judul }}"
             class="w-full h-72 object-cover rounded-t-xl">

        <!-- Konten -->
        <div class="p-6 sm:p-10">

            <!-- Judul -->
            <h1 class="text-3xl sm:text-4xl font-bold mb-4 break-words leading-tight">
                {{ $konten->judul }}
            </h1>

            <!-- Metadata -->
            <div class="text-sm text-gray-500 flex flex-wrap items-center gap-4 mb-6">
                <div class="flex items-center gap-1">
                    <i class='bx bx-calendar'></i>
                    <span>{{ $konten->created_at->format('d M Y') }}</span>
                </div>
                <div class="flex items-center gap-1">
                    <i class='bx bx-user'></i>
                    <span>{{ $konten->user->name ?? 'User' }}</span>
                </div>
                <div class="flex items-center gap-1">
                    <i class='bx bx-show'></i>
                    <span>{{ $konten->dibaca }}x dilihat</span>
                </div>
            </div>

            <!-- Deskripsi -->
            <div class="prose max-w-full text-gray-800 leading-relaxed text-justify">
                {!! $konten->deskripsi !!}
            </div>

            <br><br>
            <!-- Tombol Kembali -->
            <div class="mb-1">
                <a href="{{ route('komunitas.index') }}"
                   class="inline-flex items-center hover:text-green-900 font-medium text-sm bg-green-100 hover:bg-green-200 px-4 py-2 rounded transition">
                    <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Komunitas
                </a>
            </div>

            <!-- Gambar tambahan jika ada -->
            @if($konten->gambar)
                @php $galeri = json_decode($konten->gambar, true); @endphp
                @if(count($galeri))
                    <div class="mt-8">
                        <h3 class="text-lg font-semibold text-gray-700 mb-3">Galeri Tambahan:</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($galeri as $gambar)
                                <img src="{{ asset('storage/' . $gambar) }}" alt="Gambar Tambahan"
                                     class="rounded-lg shadow h-48 object-cover w-full">
                            @endforeach
                        </div>
                    </div>
                @endif
            @endif
        </div>
    </div>
</section>

@endsection
