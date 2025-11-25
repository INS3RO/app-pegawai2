@extends('master')

@section('title', 'Edit Jabatan')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit Data Jabatan</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('positions.update', $position->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="nama_jabatan" class="form-label">Nama Jabatan</label>
                    <input type="text" class="form-control @error('nama_jabatan') is-invalid @enderror" 
                           id="nama_jabatan" name="nama_jabatan" 
                           value="{{ old('nama_jabatan', $position->nama_jabatan) }}">
                    
                    @error('nama_jabatan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="gaji_pokok" class="form-label">Gaji Pokok (Rp)</label>
                    <input type="number" class="form-control @error('gaji_pokok') is-invalid @enderror" 
                           id="gaji_pokok" name="gaji_pokok" 
                           value="{{ old('gaji_pokok', $position->gaji_pokok) }}">
                    
                    @error('gaji_pokok')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('positions.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection