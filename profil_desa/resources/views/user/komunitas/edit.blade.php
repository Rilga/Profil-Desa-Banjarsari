<x-app-layout>
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-xl shadow-md mt-6">
        <h2 class="text-2xl font-bold mb-4 text-gray-800">✏️ Edit Konten Komunitas</h2>

        <form action="{{ route('user.komunitas.update', $konten->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Judul -->
            <div>
                <label for="judul" class="block font-semibold text-gray-700">Judul</label>
                <input type="text" id="judul" name="judul" value="{{ old('judul', $konten->judul) }}" class="w-full mt-1 border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
            </div>

            <!-- Cover -->
            <div>
                <label for="cover" class="block font-semibold text-gray-700">Ganti Cover (kosongkan jika tidak ingin mengubah)</label>
                <input type="file" id="cover" name="cover" class="mt-1" accept="image/*">
                @if($konten->cover)
                    <img src="{{ asset('storage/' . $konten->cover) }}" alt="Cover Lama" class="w-32 mt-2 rounded shadow">
                @endif
            </div>

            <!-- Gambar tambahan -->
            <div>
                <label for="gambar" class="block font-semibold text-gray-700">Tambah Gambar Tambahan</label>
                <input type="file" id="gambar" name="gambar[]" class="mt-1" accept="image/*" multiple>
            </div>

            <!-- Deskripsi -->
            <div>
                <label for="deskripsi" class="block font-semibold text-gray-700">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="6" class="w-full mt-1 border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>{{ old('deskripsi', $konten->deskripsi) }}</textarea>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded shadow transition">
                    Update Konten
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
