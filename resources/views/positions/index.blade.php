@extends('master')

@section('title', 'Daftar Jabatan')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Daftar Jabatan</h2>
        <a href="{{ route('positions.create') }}" class="btn btn-primary">
            + Tambah Jabatan
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th width="5%">No</th>
                    <th>Nama Jabatan</th>
                    <th>Gaji Pokok</th>
                    <th width="15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($positions as $position)
                    <tr>
                        <td>{{ $loop->iteration + ($positions->currentPage() - 1) * $positions->perPage() }}</td>
                        <td>{{ $position->nama_jabatan }}</td>
                        {{-- Format angka menjadi format mata uang Rupiah --}}
                        <td>Rp {{ number_format($position->gaji_pokok, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('positions.edit', $position->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            
                            <form action="{{ route('positions.destroy', $position->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus jabatan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Belum ada data jabatan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination Link --}}
    <div class="mt-3">
        {{ $positions->links() }}
    </div>
@endsection