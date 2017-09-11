@extends('layouts.app')

@section('content')
    <div class="container">

        @include('partial.success')
        @include('partial.error')

        <div class="row">
            <div class="col-md-6">
                <form method="GET" class="form-inline">
                    <span>Год выпуска: </span>

                    <div class="form-group">
                        <label for="yearAfter">От</label>
                        <input
                                class="form-control"
                                id="yearAfter"
                                name="yearAfter"
                                type="text"
                                value="{{ app('request')->input('yearAfter') }}"
                        >
                    </div>

                    <div class="form-group">
                        <label for="yearBefore">До</label>
                        <input
                                class="form-control"
                                id="yearBefore"
                                name="yearBefore"
                                type="text"
                                value="{{ app('request')->input('yearBefore') }}"
                        >
                    </div>

                    <input class="btn btn-default" type="submit" value="Поиск">
                </form>
            </div>

            <div class="col-md-2">
                <a href="{{ route('car.search') }}" class="btn btn-default">Сбросить</a>
            </div>
        </div>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>
                        <a href="{{ route('car.search', [
                            'order' => 'id',
                            'yearAfter' => app('request')->input('yearAfter'),
                            'yearBefore' => app('request')->input('yearBefore')
                         ]) }}">ID</a>
                    </th>
                    <th>
                        <a href="{{ route('car.search', [
                            'order' => 'brand',
                            'yearAfter' => app('request')->input('yearAfter'),
                            'yearBefore' => app('request')->input('yearBefore')
                        ]) }}">Марка</a>
                    </th>
                    <th>
                        <a href="{{ route('car.search', [
                            'order' => 'model',
                            'yearAfter' => app('request')->input('yearAfter'),
                            'yearBefore' => app('request')->input('yearBefore')
                        ]) }}">Модель</a>
                    </th>
                    <th>
                        <a href="{{ route('car.search', [
                            'order' => 'category',
                            'yearAfter' => app('request')->input('yearAfter'),
                            'yearBefore' => app('request')->input('yearBefore')
                        ]) }}">Категория</a>
                    </th>
                    <th>
                        <a href="{{ route('car.search', [
                            'order' => 'price',
                            'yearAfter' => app('request')->input('yearAfter'),
                            'yearBefore' => app('request')->input('yearBefore')
                        ]) }}">Цена</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @if(isset($cars))
                    @foreach($cars as $car)
                        <tr>
                            <td>{{ $car->id }}</td>
                            <td>{{ $car->brand }}</td>
                            <td>{{ $car->model }}</td>
                            <td>{{ $car->category }}</td>
                            <td>{{ $car->price}}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endsection