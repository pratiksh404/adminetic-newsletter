<?php

namespace Adminetic\Newsletter\Exports;

use Adminetic\Newsletter\Models\Admin\Subscriber;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class SubscribersExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Subscriber::all();
    }

    public function map($subscriber): array
    {
        return [
            $subscriber->email,
            $subscriber->status ? 'Subscribed' : 'Not Subscribed',
            $subscriber->updated_at->format('Y-m-d')
        ];
    }

    public function headings(): array
    {
        return [
            'Email',
            'Status',
            'Date',
        ];
    }
}
