@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('car.create') }}" class="btn btn-info">Добавить авто</a>
                    <a href="{{ route('car.search') }}" class="btn btn-default">Поиск авто</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
