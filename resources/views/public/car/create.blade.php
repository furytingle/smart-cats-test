@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-2">

                @include('partial.form_error')

                <form method="POST" action="{{ route('car.create') }}">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="brand">Марка</label>
                        <select id="brand" name="carBrand" class="form-control">
                            <option value="" selected>...</option>
                            @if($brands)
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="model">Модель</label>
                        <select id="model" name="carModel" class="form-control"></select>
                    </div>

                    <div class="form-group">
                        <label for="year">Год выпуска</label>
                        <input type="text" id="year" name="yearMade" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="owner">Имя владельца</label>
                        <input type="text" id="owner" name="ownerName" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="price">Цена</label>
                        <input type="text" id="price" name="price" class="form-control">
                    </div>

                    <input type="submit" class="btn btn-success" value="Сохранить">
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $("#brand").on('change', function () {

            var brandId = $(this).val();
            var url = "{{ route('car.brands') }}";

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "GET",
                dataType: "JSON",
                url: url,
                data: {
                    brandId: brandId
                },
                success: function (response) {
                    if (response.success) {
                        $("#model").empty();

                        response.brands.forEach(function (item) {
                            $("#model").append(
                                    $("<option></option>")
                                            .text(item.name)
                                            .val(item.id)
                            );
                        });
                    } else {
                        console.log(response.message);
                    }
                }
            });
        });

    </script>
@endsection