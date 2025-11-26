@extends('master')
@section('title', 'Data Absensi')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Data Absensi</h1>
        <a href="{{ route('attendance.create') }}" class="btn btn-primary">+ Tambah Absensi</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Karyawan</th>
                            <th>Tanggal</th>
                            <th>Masuk</th>
                            <th>Keluar</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($attendances as $key => $row)
                        <tr>
                            <td>{{ $attendances->firstItem() + $key }}</td>
                            <td>{{ $row->employee->nama_lengkap ?? 'Karyawan Terhapus' }}</td>
                            <td>{{ $row->tanggal }}</td>
                            <td>{{ $row->waktu_masuk ?? '-' }}</td>
                            <td>{{ $row->waktu_keluar ?? '-' }}</td>
                            <td>
                                <span class="badge {{ $row->status_absensi == 'hadir' ? 'bg-success' : ($row->status_absensi == 'alpha' ? 'bg-danger' : 'bg-warning') }}">
                                    {{ ucfirst($row->status_absensi) }}
                                </span>
                            </td>
                            <td class="text-center">
                                <form action="{{ route('attendance.destroy', $row->id) }}" method="POST">
                                    <a href="{{ route('attendance.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="7" class="text-center">Belum ada data absensi.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end mt-3">{{ $attendances->links() }}</div>
        </div>
    </div>
@endsection