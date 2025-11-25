<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'nama_lengkap',
        'email',
        'no_telpon',
        'tanggal_kelahiran',
        'alamat',
        'tanggal_masuk',
        'status',
    ];

    // Relationships
    public function department()
    {
        return $this->belongsTo(Department::class, 'departemen_id');
    }

    public function position()
    {
        return $this->belongsTo(Position::class, 'jabatan_id');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'karyawan_id');
    }

    public function salaries()
    {
        return $this->hasMany(Salary::class, 'karyawan_id');
    }

}

 