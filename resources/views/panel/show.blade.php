@extends('logger::panel.layouts.master')

@section('title')
    {{ $log->message }}
@stop

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('log.index') }}">Logs</a></li>
    <li class="breadcrumb-item active">{{ strtolower($log->level_name->name) }}</li>
@stop

@section('content')
    <div class="row">
        <div class="col-md-4">
            @include('logger::panel.blocks._status')
            @include('logger::panel.blocks._actions')
        </div>
        <div class="col-md-8">
            @include('logger::panel.blocks._trace')
        </div>
    </div>

@stop
