<?php

namespace App\Models\Pasien;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    protected $table = 'data_pasiens';

    protected $fillable = [
        'nik',
        'nama',
        'nama_kk',
        'alamat',
        'tanggal_lahir',
        'usia',
        'no_hp',
        'status_pasien',
    ];
}
