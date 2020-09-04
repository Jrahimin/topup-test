@extends('layouts.master')

@section('content')
    <div class="col-md-6">
        <form action="#">
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" id="email">
            </div>
            <div class="form-group">
                <label for="pwd">Age:</label>
                <input type="number" class="form-control" id="age">
            </div>

            <button class="btn btn-primary pull-right" onclick="checkAge()">Check Age</button>
        </form>
    </div>
@endsection

@section('additionalJS')
    <script type="text/javascript" src="{{ asset('js/task/callback.js') }}"></script>
@endsection