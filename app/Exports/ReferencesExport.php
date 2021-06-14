<?php

namespace App\Exports;

use App\Models\references;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReferencesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $post = references::all(); 

     
        return $post;
    }
}
