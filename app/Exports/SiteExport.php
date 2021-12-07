<?php

namespace App\Exports;

use App\Site;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadings;



class SiteExport implements FromCollection, WithHeadings
{
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $site = Site::find($this->id);
        return new Collection([
            [
                'Name' => $site->name,
                'Type' => $site->type,
                "Creator's name" => $site->user->name,
                "Creator's email" => $site->user->email
            ]
        ]);
    }

    public function headings() : array 
    {
        return ['name', 'type', 'Creator\'s name', 'Creator\'s email'];
    }

}
