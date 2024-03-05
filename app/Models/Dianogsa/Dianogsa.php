<?php

namespace App\Models\Dianogsa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dianogsa extends Model
{
    use HasFactory;
    protected $table = 'data_dianogsas';
    protected $fillable = ['no_rm', 'nama', 'dianogsa', 'tanggal_periksa'];
}
