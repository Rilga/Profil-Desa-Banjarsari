<x-app-layout>
    <div class="max-w-5xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="mb-6">
            <div class="mb-6">
                <img src="{{ asset('storage/' . $konten->cover) }}" alt="Cover" class="w-full rounded-lg shadow-md">
            </div>
            <h2 class="text-3xl font-bold text-gray-800">{{ $konten->judul }}</h2>
            <p class="text-sm text-gray-500">Oleh: {{ $konten->user->name }} | Dibaca: {{ $konten->dibaca }} kali</p>
            <p class="mt-2 text-sm">
                Status:
                <span class="font-semibold capitalize
                    {{ $konten->status === 'approved' ? 'text-green-600' :
                       ($konten->status === 'rejected' ? 'text-red-600' : 'text-yellow-500') }}">
                    {{ $konten->status }}
                </span>
            </p>
        </div>
        <div class="mb-6">
            <h3 class="text-xl font-semibold text-gray-700 mb-2">Deskripsi:</h3>
            <div class="prose max-w-none">
                {!! $konten->deskripsi !!}
            </div>
        </div>

        @if ($konten->gambar && count(json_decode($konten->gambar, true)) > 0)
            <div class="mb-6">
                <h3 class="text-xl font-semibold text-gray-700 mb-2">Gambar Tambahan:</h3>
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach (json_decode($konten->gambar, true) as $gambar)
                        <img src="{{ asset('storage/' . $gambar) }}" alt="Gambar Tambahan" class="w-full rounded-lg shadow-md">
                    @endforeach
                </div>
            </div>
        @endif

        <div class="mt-6">
            <a href="{{ route('admin.komunitas.index') }}"
               class="inline-block bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700 transition">
                ← Kembali ke Daftar Konten
            </a>
        </div>
    </div>
</x-app-layout>
