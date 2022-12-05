<div class="card">
    <div class="card-header">
        <div class="inline-block">
            <h3>Class: </h3>
            {{ $log->class }}
        </div>
        <div class="inline-block mt-4">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h4>{{ $log->level_name->value }}</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div>
            <b class="font-weight-bold">Status:</b>
            @if($log->status == \App\Enums\ErrorStatus::NEW)
                <span class="badge badge-danger">{{ strtolower($log->status->name) }}</span>
            @else
                <span class="badge badge-warning">{{ strtolower($log->status->name) }}</span>
            @endif
        </div>

        <div>
            <b class="font-weight-bold">Time:</b>
            {{ $log->created_at }}
        </div>

        <div>
            <b class="font-weight-bold">Channel:</b>
            {{ $log->channel }}
        </div>

        <div class="mt-4 mb-4">
            <b class="font-weight-bold">File:</b>
            {{ $log->file }}
        </div>

        <div>
            <b class="font-weight-bold">Lavel:</b>
            {{ $log->level }}
        </div>

        <div>
            <b class="font-weight-bold">Lavel Name:</b>
            {{ $log->level_name->value }}
        </div>

        <div>
            <b class="font-weight-bold">Code:</b>
            {{ $log->code }}
        </div>

    </div>
</div>
