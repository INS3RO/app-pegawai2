@extends('master')
@section('title', 'Detail Pegawai')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0">Detail Pegawai: {{ $employee->nama_lengkap }}</h5>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th width="200px">Nama Lengkap</th>
                        <td>{{ $employee->nama_lengkap }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $employee->email }}</td>
                    </tr>
                    <tr>
                        <th>Nomor Telepon</th>
                        <td>{{ $employee->nomor_telepon }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td>{{ $employee->tanggal_lahir }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $employee->alamat }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Masuk</th>
                        <td>{{ $employee->tanggal_masuk }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            <span class="badge {{ $employee->status == 'aktif' ? 'bg-success' : 'bg-secondary' }}">
                                {{ ucfirst($employee->status) }}
                            </span>
                        </td>
                    </tr>
                </table>
                
                <div class="mt-4">
                    <a href="{{ route('employees.index') }}" class="btn btn-secondary">Kembali</a>
                    <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning">Edit</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection