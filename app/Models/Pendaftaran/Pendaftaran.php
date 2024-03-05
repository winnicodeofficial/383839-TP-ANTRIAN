<?php

namespace App\Models\Pendaftaran;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    public function JenisPasien()
    {
        return $this->belongsTo(JenisPasien::class, 'jenis_pasien_id');
    }
}
