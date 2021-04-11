<?php

namespace App\Exports;

use App\Payment;
use App\Client;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LatestPaymentsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $end_date = Carbon::now();
        $start_date = $end_date->subDays(30);

        $payments = Payment::filterPayments($start_date, $end_date)
                    ->select(DB::raw('distinct on (user_id) *'))
                    ->orderBy('user_id', 'desc')
                    ->orderBy('created_at', 'desc');

        $data = Client::leftJoinSub($payments, 'filtered_payments', function ($join) {
                                        $join->on('clients.id', '=', 'filtered_payments.user_id');
                                    })
                ->select('clients.id', 'clients.name', 'clients.surname', 'filtered_payments.amount', 'filtered_payments.created_at')
                ->get();
        
        return $data;
    }

    public function headings(): array
    {
        return ["ID", "Name", "Surname", "Last payment amount", "Last payment date"];
    }
}
