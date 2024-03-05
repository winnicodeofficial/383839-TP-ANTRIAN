<?php

namespace App\Exports\Kunjung;

use App\Models\Kunjung\Kunjung;
use Maatwebsite\Excel\Concerns\FromCollection;

class KunjungExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Kunjung::all();
    }
}
