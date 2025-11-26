@extends('master')
@section('title', 'Edit Absensi')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow">
            {{-- Header Card berwarna kuning (warning) sebagai penanda halaman Edit --}}
            <div class="card-header bg-warning text-dark">
                <h5 class="mb-0">Edit Data Absensi</h5>
            </div>
            
            <div class="card-body">
                {{-- Form diarahkan ke route update dengan menyertakan ID Absensi --}}
                <form action="{{ route('attendance.update', $attendance->id) }}" method="POST">
                    @csrf
                    @method('PUT') {{-- Wajib ada untuk proses Update --}}

                    {{-- Pilihan Nama Karyawan --}}
                    <div class="mb-3">
                        <label class="form-label">Nama Karyawan</label>
                        <select name="karyawan_id" class="form-select @error('karyawan_id') is-invalid @enderror" required>
                            <option value="">-- Pilih Karyawan --</option>
                            @foreach($employees as $emp)
                                <option value="{{ $emp->id }}" 
                                    {{-- Logika untuk memilih otomatis karyawan yang sedang diedit --}}
                                    {{ old('karyawan_id', $attendance->karyawan_id) == $emp->id ? 'selected' : '' }}>
                                    {{ $emp->nama_lengkap }}
                                </option>
                            @endforeach
                        </select>
                        @error('karyawan_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    {{-- Input Tanggal --}}
                    <div class="mb-3">
                        <label class="form-label">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" 
                               value="{{ old('tanggal', $attendance->tanggal) }}" required>
                        @error('tanggal') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    {{-- Input Waktu Masuk & Keluar (Dibuat sejajar 2 kolom) --}}
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Waktu Masuk</label>
                            {{-- Format waktu di HTML time input biasanya butuh HH:MM --}}
                            <input type="time" name="waktu_masuk" class="form-control" 
                                   value="{{ old('waktu_masuk', $attendance->waktu_masuk) }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Waktu Keluar</label>
                            <input type="time" name="waktu_keluar" class="form-control" 
                                   value="{{ old('waktu_keluar', $attendance->waktu_keluar) }}">
                        </div>
                    </div>

                    {{-- Pilihan Status Absensi --}}
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status_absensi" class="form-select @error('status_absensi') is-invalid @enderror">
                            <option value="hadir" {{ old('status_absensi', $attendance->status_absensi) == 'hadir' ? 'selected' : '' }}>Hadir</option>
                            <option value="izin" {{ old('status_absensi', $attendance->status_absensi) == 'izin' ? 'selected' : '' }}>Izin</option>
                            <option value="sakit" {{ old('status_absensi', $attendance->status_absensi) == 'sakit' ? 'selected' : '' }}>Sakit</option>
                            <option value="alpha" {{ old('status_absensi', $attendance->status_absensi) == 'alpha' ? 'selected' : '' }}>Alpha</option>
                        </select>
                        @error('status_absensi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('attendance.index') }}" class="btn btn-secondary