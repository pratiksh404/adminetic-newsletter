<?php

namespace Adminetic\Newsletter\Imports;

use Adminetic\Newsletter\Models\Admin\Subscriber;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SubscribersImport implements ToCollection, WithHeadingRow
{
    /**
     * @param  Collection  $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            Subscriber::create([
                'email' => $row['email'],
            ]);
        }
    }
}
