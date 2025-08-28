<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Manajemen Aparat Desa') }}
        </h2>
    </x-slot>

    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="card-title mb-0">Data Aparatur Desa</h5>
            <a href="{{ route('admin.aparat.create') }}" class="btn btn-success">
                <i class="bi bi-plus-circle me-2"></i>Tambah Data
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($aparatur as $index => $aparat)
                        <tr>
                            <th scope="row">{{ $aparatur->firstItem() + $index }}</th>
                            <td>
                                @if ($aparat->foto)
                                    <img src="{{ asset('storage/' . $aparat->foto) }}" alt="Foto {{ $aparat->nama }}" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
                                @else
                                    <img src="{{ asset('images/profile.png') }}" alt="Default Avatar" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
                                @endif
                            </td>
                            <td>{{ $aparat->nama }}</td>
                            <td>{{ $aparat->jabatan }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.aparat.edit', $aparat) }}" class="btn btn-sm btn-warning me-2">Edit</a>
                                <form action="{{ route('admin.aparat.destroy', $aparat) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
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

        @if ($aparatur->hasPages())
            <div class="mt-4 d-flex justify-content-center">
                {{ $aparatur->links() }}
            </div>
        @endif
    </div>
</x-app-layout>
