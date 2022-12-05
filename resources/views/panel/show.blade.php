@extends('admin::layouts.master')

@section('title')
    {{ $log->message }}
@stop

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.log.index') }}">Logs</a></li>
    <li class="breadcrumb-item active">{{ strtolower($log->level_name->name) }}</li>
@stop

@section('content')
    <div class="row">
        <div class="col-md-4">
            @include('admin::logs.blocks._status')
            @include('admin::logs.blocks._actions')
        </div>
        <div class="col-md-8">
            @include('admin::logs.blocks._trace')
        </div>
    </div>

@stop
