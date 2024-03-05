<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolOperationalAssistance extends Model
{
    protected $guarded = [];

    public function commodities()
    {
        return $this->hasMany(Commodity::class);
    }
}
