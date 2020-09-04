@extends('layouts.master')

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="row">
                <div class="panel-title col-md-6">
                    {{ $heading }}
                </div>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-responsive table-hover table-striped">
                <thead>
                <tr>
                    <th>Buyer Id</th>
                    <th>Buyer Name</th>
                    <th>Total Diary Taken</th>
                    <th>Total Pen Taken</th>
                    <th>Total Eraser Taken</th>
                    <th>Total Items Taken</th>
                </tr>
                </thead>

                <tbody>
                @foreach($buyers as $buyer)
                    <tr>
                        <td>{{$buyer->id}}</td>
                        <td>{{$buyer->name}}</td>
                        <td>{{$buyer->diaries->sum('amount')}}</td>
                        <td>{{$buyer->pens->sum('amount')}}</td>
                        <td>{{$buyer->erasers->sum('amount')}}</td>
                        <td>{{ $buyer->diaries->sum('amount') + $buyer->pens->sum('amount') + $buyer->erasers->sum('amount') }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
