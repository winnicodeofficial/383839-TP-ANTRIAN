<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommodityLocation extends Model
{
    protected $guarded = [];

    public function commodities()
    {
        return $this->hasMany(Commodity::class);
    }
}
