<?php

namespace App\Models\Jadwal;

use App\Models\Dokter\Dokter;
use App\Models\Poli\Poli;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'data_jadwalprakteks';
    protected $fillable = ['dokter_id', 'poli_id', 'jadwal_praktek', 'hari_oper'];

    public function poli()
    {
        return $this->belongsTo(Poli::class, 'poli_id');
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'dokter_id');
    }
}
