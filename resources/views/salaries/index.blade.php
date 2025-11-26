@extends('master')
@section('title', 'Data Gaji')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Data Gaji Karyawan</h1>
        <a href="{{ route('salaries.create') }}" class="btn btn-primary">+ Input Gaji</a>
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
                            <th>Karyawan</th>
                            <th>Bulan</th>
                            <th>Gaji Pokok</th>
                            <th>Tunjangan</th>
                            <th>Potongan</th>
                            <th>Total Gaji</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($salaries as $key => $row)
                        <tr>
                            <td>{{ $salaries->firstItem() + $key }}</td>
                            <td>{{ $row->employee->nama_lengkap ?? '-' }}</td>
                            <td>{{ $row->bulan }}</td>
                            <td>Rp {{ number_format($row->gaji_pokok, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($row->tunjangan, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($row->potongan, 0, ',', '.') }}</td>
                            <td class="fw-bold text-success">Rp {{ number_format($row->total_gaji, 0, ',', '.') }}</td>
                            <td>
                                <form action="{{ route('salaries.destroy', $row->id) }}" method="POST">
                                    <a href="{{ route('salaries.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="8" class="text-center">Data kosong.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end mt-3">{{ $salaries->links() }}</div>
        </div>
    </div>
@endsection