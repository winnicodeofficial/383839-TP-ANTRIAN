<?php

namespace App\Models\Kunjung;

use App\Models\Poli\Poli;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kunjung extends Model
{
    use HasFactory;
    protected $table = 'data_kunjungs';
    protected $fillable = ['nama_pasien', 'no_daftar', 'tanggal_daftar', 'poli_id', 'dianogsa'];

    public function poli()
    {
        return $this->belongsTo(Poli::class, 'poli_id');
    }
    use HasFactory;
}
