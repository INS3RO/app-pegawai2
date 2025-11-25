@extends('master')
@section('title', 'Daftar Departemen')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Departemen</h2>
        <a href="{{ route('departments.create') }}" class="btn btn-primary">Tambah Departemen</a>
    </div>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Departemen</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($departments as $dept)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $dept->nama_departemen }}</td>
                <td>
                    <a href="{{ route('departments.edit', $dept->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('departments.destroy', $dept->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $departments->links() }}
@endsection
