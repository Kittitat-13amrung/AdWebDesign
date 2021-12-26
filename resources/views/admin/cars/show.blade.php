@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">MAKE: {{ $car->make }}</div>

                <div class="card-body">
                        <table id="table-cars" class="table table-hover">
                            <tbody>
                                <tr>
                                    <td>Model</td>
                                    <td>{{ $car->model }}</td>
                                </tr>
                                <tr>
                                    <td>Price</td>
                                    <td>€{{ $car->price }}</td>
                                </tr>
                                <tr>
                                    <td>Engine Size</td>
                                    <td>{{ $car->engine_size }} Litres</td>
                                </tr>
                                <tr>
                                    <td>Image</td>
                                    <td>{{ $car->image_id }}</td>
                            </tbody>
                        </table>

                        <a href="{{ route('admin.cars.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
