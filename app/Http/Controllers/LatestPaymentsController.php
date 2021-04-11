<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Client;
use App\Payment;
use Carbon\Carbon;

class LatestPaymentsController extends Controller
{
    public function show($start_date = '2020-01-01 00:00:01', $end_date = null)
    {
        if (!$end_date)
            $end_date = Carbon::now();
        
        $payments = Payment::filterPayments($start_date, $end_date)
                    ->select(DB::raw('distinct on (user_id) *'))
                    ->orderBy('user_id', 'desc')
                    ->orderBy('created_at', 'desc');
        
        $data = Client::leftJoinSub($payments, 'filtered_payments', function ($join) {
                                        $join->on('clients.id', '=', 'filtered_payments.user_id');
                                    })
                ->select('clients.id', 'clients.name', 'clients.surname', 'filtered_payments.amount', 'filtered_payments.created_at')
                ->get();

        return view('payments', ['payments' => $data]);
    }
}
