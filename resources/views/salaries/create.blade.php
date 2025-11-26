@extends('master')
@section('title', 'Input Gaji')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">Input Gaji Pegawai</div>
            <div class="card-body">
                <form action="{{ route('salaries.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Karyawan</label>
                            <select name="karyawan_id" class="form-select" required>
                                <option value="">Pilih Karyawan</option>
                                @foreach($employees as $emp)
                                    <option value="{{ $emp->id }}">{{ $emp->nama_lengkap }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Bulan (Misal: Januari 2025)</label>
                            <input type="text" name="bulan" class="form-control" required placeholder="Januari 2025">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Gaji Pokok (Rp)</label>
                        <input type="number" name="gaji_pokok" class="form-control" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tunjangan (Rp)</label>
                            <input type="number" name="tunjangan" class="form-control" value="0">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Potongan (Rp)</label>
                            <input type="number" name="potongan" class="form-control" value="0">
                        </div>
                    </div>

                    <div class="alert alert-info">
                        <small>Total Gaji akan dihitung otomatis oleh sistem.</small>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Gaji</button>
                    <a href="{{ route('salaries.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection