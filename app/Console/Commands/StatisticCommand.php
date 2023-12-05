<?php

namespace App\Console\Commands;

use App\Jobs\StatisticGlobalJob;
use App\Jobs\StatisticMonthlyJob;
use Illuminate\Console\Command;

class StatisticCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'statistics';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        dispatch(new StatisticMonthlyJob());
        dispatch(new StatisticGlobalJob());
    }
}
