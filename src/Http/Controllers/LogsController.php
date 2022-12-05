<?php

namespace AlphaDevTeam\Logger\Http\Controllers;

use AlphaDevTeam\Logger\Enums\ErrorStatus;
use AlphaDevTeam\Logger\Models\Log;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

class LogsController
{
    public function index()
    {
        $logs = Log::query();
        $dates = $this->getDates($logs);
        $logs = $logs->filter(new LogFilter())->orderBy('created_at', 'desc')->paginate(20);

        $statuses = collect(ErrorStatus::cases())->pluck('name', 'value');

        return view('logs.index', [
            'logs' => $logs,
            'dates' => $dates,
            'statuses' => $statuses
        ]);
    }

    public function show(Log $log)
    {
        $statuses = collect(ErrorStatus::cases())->pluck('name', 'value');

        return view('logs.show', [
            'log' => $log,
            'statuses' => $statuses
        ]);
    }

    public function changeStatus(Log $log)
    {
        request()->validate([
            'status' => [
                'required', Rule::in(ErrorStatus::names())
            ]
        ]);

        $status = ErrorStatus::fromName(request()->input('status'));
        $log->update(['status' => $status]);

        return back();
    }

    public function destroy(Log $log)
    {
        $log->delete();

        return redirect()->route('admin.log.index');

    }

    private function getDates($logs): array
    {
        $allDates = $logs->pluck('created_at');
        $allDates->transform(function ($item) {
            return Carbon::parse($item)->format('Y-m-d');
        });

        $dates = [];
        foreach ($allDates->unique()->toArray() as $date) {
            $dates[] = $date;
        }

        return $dates;
    }

}
