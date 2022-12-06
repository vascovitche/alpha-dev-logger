<?php

namespace AlphaDevTeam\Logger\Console\Commands;

use AlphaDevTeam\Logger\Models\Log;
use Carbon\Carbon;
use Illuminate\Console\Command;

class RefreshLogsTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'refresh-logs:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh Logs Table in DB';

    public function handle()
    {
        $this->totallyDestroyOld();
        $this->softDestroyOff();
    }

    private function totallyDestroyOld()
    {
        $edgeDateTime = Carbon::now()
            ->subMonths(config('logger-alpha.db.remove_in_months.totally'))
            ->format('Y-m-d');

        Log::whereDate('created_at', '<=', $edgeDateTime)->forceDelete();
    }

    private function softDestroyOff()
    {
        $edgeDateTime = Carbon::now()
            ->subMonths(config('logger-alpha.db.remove_in_months.soft'))
            ->format('Y-m-d');

        Log::whereDate('created_at', '<=', $edgeDateTime)->delete();
    }
}
