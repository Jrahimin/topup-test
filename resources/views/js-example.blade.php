@extends('layouts.master')

@section('content')
    <h2>{{ $heading }}</h2>
    <div id="listDiv">

    </div>

    @if($task != 'foreach')
        @if($task == 'filter')
            <div>
                <input type="text" name="filterTxt" id="filterTxt">
                <button class="btn btn-sm btn-primary" id="filter">Filter</button>
            </div>
        @else
            <button class="btn btn-primary col-md-4" id="{{ $task }}">{{ $task }}</button>
        @endif
    @endif

@endsection

@section('additionalJS')
    <script type="text/javascript" src="{{ asset('js/task/example.js') }}"></script>
@endsection
