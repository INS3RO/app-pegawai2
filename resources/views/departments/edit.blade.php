@extends('master')
@section('title', 'Edit Departemen')
@section('content')
    <h2>Edit Departemen</h2>
    <form action="{{ route('departments.update', $department->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nama Departemen</label>
            <input type="text" name="nama_departemen" value="{{ $department->nama_departemen }}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection