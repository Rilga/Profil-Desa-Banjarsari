<x-app-layout>
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-xl shadow-md mt-6">
        <h2 class="text-2xl font-bold mb-4 text-gray-800">📝 Tambah Konten Komunitas</h2>

        <form action="{{ route('user.komunitas.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Judul -->
            <div>
                <label for="judul" class="block font-semibold text-gray-700">Judul <span class="text-red-500">*</span></label>
                <input type="text" id="judul" name="judul" class="w-full mt-1 border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
            </div>

            <!-- Cover -->
            <div>
                <label for="cover" class="block font-semibold text-gray-700">Cover (wajib) <span class="text-red-500">*</span></label>
                <input type="file" id="cover" name="cover" class="mt-1" accept="image/*" required>
            </div>

            <!-- Gambar tambahan -->
            <div>
                <label for="gambar" class="block font-semibold text-gray-700">Gambar Tambahan (opsional)</label>
                <input type="file" id="gambar" name="gambar[]" class="mt-1" accept="image/*" multiple>
            </div>

            <!-- Deskripsi -->
            <div>
                <label for="deskripsi" class="block font-semibold text-gray-700">Deskripsi <span class="text-red-500">*</span></label>
                <textarea name="deskripsi" id="deskripsi" rows="6" class="w-full mt-1 border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required></textarea>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded shadow transition">
                    Simpan Konten
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
