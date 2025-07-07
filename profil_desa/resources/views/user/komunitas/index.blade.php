<x-app-layout>
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Konten Saya</h2>
            <a href="{{ route('user.komunitas.create') }}"
               class="inline-block px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg shadow transition">
                + Tambah Konten
            </a>
        </div>

        @if($kontens->count())
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($kontens as $konten)
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition group flex flex-col justify-between">
                    <img src="{{ asset('storage/'.$konten->cover) }}"
                         alt="Cover Konten"
                         class="h-48 w-full object-cover group-hover:scale-105 transition duration-300">

                    <div class="p-4 flex flex-col justify-between h-full flex-1">
                        <div class="flex-1">
                            <h3 class="text-lg font-bold text-gray-800 mb-1 truncate">{{ $konten->judul }}</h3>

                            <p class="text-sm text-gray-500 mb-2 line-clamp-2">
                                {{ \Illuminate\Support\Str::limit(strip_tags($konten->deskripsi), 100) }}
                            </p>

                            <p class="text-sm">
                                Status: 
                                <span class="capitalize font-semibold 
                                    {{ $konten->status === 'approved' ? 'text-green-600' : 
                                        ($konten->status === 'rejected' ? 'text-red-600' : 'text-yellow-500') }}">
                                    {{ $konten->status }}
                                </span>
                            </p>
                        </div>

                        <div class="mt-4 flex justify-between items-center">
                            <a href="{{ route('user.komunitas.show', $konten->id) }}"
                               class="text-sm text-blue-600 hover:underline font-medium">
                                📄 Selengkapnya
                            </a>

                            <div class="flex gap-2">
                                <a href="{{ route('user.komunitas.edit', $konten->id) }}"
                                   class="px-2 py-1 bg-yellow-400 text-white text-xs rounded hover:bg-yellow-500 transition">
                                    ✏️ Edit
                                </a>
                                <form action="{{ route('user.komunitas.destroy', $konten->id) }}" method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus konten ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="px-2 py-1 bg-red-500 text-white text-xs rounded hover:bg-red-600 transition">
                                        🗑️ Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @else
            <div class="text-gray-500 mt-12 text-center">
                <p>Anda belum menambahkan konten komunitas apapun.</p>
            </div>
        @endif
    </div>
</x-app-layout>
