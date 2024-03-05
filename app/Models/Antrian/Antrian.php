<?php

namespace App\Models\Antrian;

use App\Models\Dokter\Dokter;
use App\Models\Poli\Poli;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    use HasFactory;
    protected $table = 'data_antrians';

    protected $fillable = ['dokter_id', 'poli_id', 'nomor_antrian'];

    public function poli()
    {
        return $this->belongsTo(Poli::class, 'poli_id');
    }
    public function Dokter()
    {
        return $this->belongsTo(Dokter::class, 'dokter_id');
    }
}
