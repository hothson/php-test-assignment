<?php

namespace App\Exports;

use App\Site;
use Maatwebsite\Excel\Concerns\FromCollection;

class SiteExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Site::all();
    }
}
