@extends('main')

@section('title')
Блог на ларавел
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>О компании</h1>
            <hr>
            <div class="panel panel-default">
                <div class="panel-body">
                    <p>Мое имя на английском: {{ $data['fullname'] }}</p>
                    <p>Email: {{ $data['email'] }}</p>
                </div>
            </div>
        </div>
    </div>

@endsection