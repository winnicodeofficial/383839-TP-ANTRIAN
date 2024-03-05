<?php

namespace App\Models\Dokter;

use App\Models\Poli\Poli;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;
    protected $table = 'data_dokters';
    protected $fillable = ['nama_dokter'];
}
