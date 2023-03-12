<?php

namespace App\Exports;

use App\Subscriber;
use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SubscriberExport implements FromCollection,  WithHeadings, WithMapping, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public $cardId;
    public function __construct($cardId)
    {
        $this->cardId = $cardId;
    }

    public function collection()
    {
        return Subscriber::select('id', 'email', 'created_at')->where('card_id', $this->cardId)->get();
    }


    public function headings(): array
    {
        return [
            'No',
            'Email',
            "Subscribetion Date"
        ];
    }
    public function map($subscriber): array
    {
        return [
            $subscriber->id,
            $subscriber->email,
            date('d-M-Y', strtotime($subscriber->created_at)),
        ];
    }
}
