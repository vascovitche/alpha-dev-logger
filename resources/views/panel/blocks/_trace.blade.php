<div class="card">
    <div class="card-header">
        <h3>Trace:</h3>
    </div>
    <div class="card-body">
        <ul>
            @foreach($log->trace as $item)
                <li class="m-2">{{ $item }}</li>
            @endforeach
        </ul>
    </div>
</div>
