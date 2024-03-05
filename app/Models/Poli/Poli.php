<?php

namespace App\Models\Poli;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    use HasFactory;
    protected $table = 'data_polis';

    protected $fillable = [
        'nama_poli',
    ];
}
