<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Manajemen Berita') }}
        </h2>
    </x-slot>

    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="card-title mb-0">Data Berita</h5>
            <a href="{{ route('admin.berita.create') }}" class="btn btn-success">
                <i class="bi bi-plus-circle me-2"></i>Tambah Berita
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Cover</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Dilihat</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($berita as $index => $b)
                        <tr>
                            <th scope="row">{{ $berita->firstItem() + $index }}</th>
                            <td>
                                <img src="{{ asset('storage/' . $b->cover) }}" alt="Cover {{ $b->judul }}" class="rounded" style="width: 100px; height: auto; object-fit: cover;">
                            </td>
                            <td>{{ $b->judul }}</td>
                            <td>{{ $b->dibaca }} kali</td>
                            <td class="text-center">
                                <a href="{{ route('admin.berita.show', $b->id) }}" class="btn btn-sm btn-info me-1">Lihat</a>
                                <a href="{{ route('admin.berita.edit', $b->id) }}" class="btn btn-sm btn-warning me-1">Edit</a>
                                <form action="{{ route('admin.berita.destroy', $b->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Data tidak ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($berita->hasPages())
            <div class="mt-4 d-flex justify-content-center">
                {{ $berita->links() }}
            </div>
        @endif
    </div>
</x-app-layout>
