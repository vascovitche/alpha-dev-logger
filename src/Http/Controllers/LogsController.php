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

        $data = $this->filterLogsByDate($logs);

        $statuses = collect(ErrorStatus::cases())->pluck('name', 'value');

        return view('logger::panel.index', [
            'logs' => $data,
            'dates' => $dates,
            'statuses' => $statuses
        ]);
    }

    public function show($log)
    {
        $statuses = collect(ErrorStatus::cases())->pluck('name', 'value');
        $log = Log::query()->whereId($log)->first();

        return view('logger::panel.show', [
            'log' => $log,
            'statuses' => $statuses
        ]);
    }

    public function changeStatus($log)
    {
        request()->validate([
            'status' => [
                'required', Rule::in(ErrorStatus::names())
            ]
        ]);

        $status = ErrorStatus::fromName(request()->input('status'));
        Log::query()->whereId($log)->update(['status' => $status]);

        return back();
    }

    public function destroy($log)
    {
        Log::query()->whereId($log)->delete();

        return redirect()->route('log.index');
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

    private function filterLogsByDate($logs)
    {
        $date = request()->get('date');

        if ($date != null) {
            return $logs->whereDate('created_at', $date)->latest('id')->paginate(20);
        } else {
            return $logs->latest('id')->paginate(20);
        }
    }

}
