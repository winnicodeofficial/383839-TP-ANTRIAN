<?php

namespace App\Models\Rekap;

use App\Models\JenisPasien\JenisPasien;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekap extends Model
{
    use HasFactory;

    protected $table = 'data_rekaps';
    protected $fillable = ['no_rm', 'no_daftar', 'nama_pasien', 'alamat', 'tanggal_lahir', 'usia', 'no_hp', 'dianogsa', 'status_pasien'];

    public function JenisPasien()
    {
        return $this->belongsTo(JenisPasien::class, 'jenis_pasien_id');
    }
}
