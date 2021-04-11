<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Exports\LatestPaymentsExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportLatestPayments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'payments:export';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export the last payment of each client within the last 30 days';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        return Excel::store(new LatestPaymentsExport, 'Payments.csv', 'local');
    }
}
