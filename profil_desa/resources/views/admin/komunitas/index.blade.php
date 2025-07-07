<x-app-layout>
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Kelola Konten Komunitas</h2>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if($kontens->count())
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($kontens as $konten)
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition group h-full flex flex-col">
                    <!-- Cover -->
                    <img src="{{ asset('storage/'.$konten->cover) }}"
                         alt="Cover Konten"
                         class="h-48 w-full object-cover">

                    <!-- Konten -->
                    <div class="p-4 flex flex-col justify-between flex-grow">
                        <div>
                            <h3 class="text-lg font-bold text-gray-800 mb-1 truncate">{{ $konten->judul }}</h3>
                            <p class="text-sm text-gray-600 mb-1">Oleh: {{ $konten->user->name }}</p>
                            <p class="text-sm text-gray-500 mb-2 line-clamp-2">
                                {{ \Illuminate\Support\Str::limit(strip_tags($konten->deskripsi), 100) }}
                            </p>
                            <p class="text-sm mb-2">
                                Status:
                                <span class="capitalize font-semibold 
                                    {{ $konten->status === 'approved' ? 'text-green-600' : 
                                        ($konten->status === 'rejected' ? 'text-red-600' : 'text-yellow-600') }}">
                                    {{ $konten->status }}
                                </span>
                            </p>
                        </div>

                        <div class="mt-4">
                            <form action="{{ route('admin.komunitas.updateStatus', $konten->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <select name="status"
                                    class="w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm mb-2">
                                    <option value="pending" {{ $konten->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="approved" {{ $konten->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                    <option value="rejected" {{ $konten->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                </select>
                                <button type="submit"
                                    class="w-full bg-blue-600 hover:bg-blue-700 text-white text-sm py-2 rounded transition">
                                    Simpan Status
                                </button>
                            </form>

                            <a href="{{ route('komunitas.show', $konten->id) }}"
                               class="text-blue-500 hover:underline text-sm block mt-3 text-center">
                                📄 Lihat Konten
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @else
            <div class="text-center text-gray-500 mt-12">Belum ada konten komunitas.</div>
        @endif
    </div>
</x-app-layout>
