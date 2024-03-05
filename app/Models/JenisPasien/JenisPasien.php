<?php

namespace App\Models\JenisPasien;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPasien extends Model
{
    use HasFactory;
    protected $table = 'data_jenispasiens';

    protected $fillable = [
        'jenis_pasien',
    ];
}
