@extends('logger::panel.layouts.master')

@push('styles')
    <style>
        .long-box {
            word-break: break-all !important;
        }
    </style>
@endpush

@section('title')
    Logs
    @include('logger::panel.blocks._dates')
@stop

@section('breadcrumb')
    <li class="breadcrumb-item active">Logs</li>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered mb-4">
                        <thead>
                        <tr>
                            <th style="width: 10%">Date</th>
                            <th style="width: 20%">Message</th>
                            <th style="width: 10%">Status</th>
                            <th style="width: 6%">Env</th>
                            <th style="width: 10%">Level</th>
                            <th style="width: 26%">File</th>
                            <th style="width: 16%">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($logs as $log)
                            <tr>
                                <td>{{ $log->created_at }}</td>
                                <td class="long-box">
                                    <a class="post-title" href="{{ route('log.show', $log->id) }}">
                                        {{ $log->message }}
                                    </a>
                                </td>
                                <td>
                                    @if($log->status == \AlphaDevTeam\Logger\Enums\ErrorStatus::NEW)
                                        <span class="badge badge-danger">{{ strtolower($log->status->name) }}</span>
                                    @else
                                        <span class="badge badge-warning">{{ strtolower($log->status->name) }}</span>
                                    @endif
                                </td>
                                <td>{{ $log->channel }}</td>
                                <td><span class="badge badge-danger">{{ $log->level_name->value }}</span></td>
                                <td class="long-box">{{ $log->file }}</td>
                                <td>
                                    <div class="d-inline-block">
                                        <a class="btn btn-primary btn-sm" href="{{ route('log.show', $log->id) }}">
                                            See Details
                                        </a>
                                    </div>

                                    <div class="d-inline-block">
                                        <form action="{{ route('log.destroy', $log->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger"
                                                    data-ask="1" data-title="Delete log"
                                                    data-message="Are you sure you want to delete the log - '{{ $log->message }}'?"
                                                    data-type="danger">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $logs->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
@stop
