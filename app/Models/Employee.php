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


}
