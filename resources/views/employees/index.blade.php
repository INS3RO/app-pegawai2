@extends('master')
@section('title', 'Daftar Pegawai')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Daftar Pegawai</h1>
        
        <a href="{{ route('employees.create') }}" class="btn btn-primary">
            + Tambah Pegawai
        </a>
    </div>

    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>Nomor Telepon</th>
                            <th>Tanggal Masuk</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($employees as $key => $employee)
                        <tr>
                            
                            <td>{{ $employees->firstItem() + $key }}</td>
                            <td>{{ $employee->nama_lengkap }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->nomor_telepon }}</td>
                            <td>{{ $employee->tanggal_masuk }}</td>
                            <td>
                                
                                <span class="badge {{ $employee->status == 'aktif' ? 'bg-success' : 'bg-secondary' }}">
                                    {{ ucfirst($employee->status) }}
                                </span>
                            </td>
                            <td class="text-center">
                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
                                    {{-- Tombol Detail --}}
                                    <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-info btn-sm text-white" title="Detail">
                                        Detail
                                    </a>

                                    {{-- Tombol Edit --}}
                                    <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                        Edit
                                    </a>

                                    @csrf
                                    @method('DELETE')
                                    {{-- Tombol Delete --}}
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">Data pegawai belum tersedia.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            
            <div class="d-flex justify-content-end">
                {{ $employees->links() }}
            </div>
        </div>
    </div>
@endsection