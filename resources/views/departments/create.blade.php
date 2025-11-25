@extends('master')
@section('title', 'Tambah Departemen')
@section('content')
    <h2>Tambah Departemen</h2>
    <form action="{{ route('departments.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama Departemen</label>
            <input type="text" name="nama_departemen" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
