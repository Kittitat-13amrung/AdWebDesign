@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">Cars: {{ $car->make }}</div>

                <div class="card-body">
                        <table id="table-cars" class="table table-hover">
                            <tbody>
                                <tr>
                                    <td>Car</td>
                                    <td>{{ $car->make }}</td>
                                </tr>
                                <tr>
                                    <td>Description</td>
                                    <td>{{ $car->model }}</td>
                                </tr>
                                <tr>
                                    <td>Location</td>
                                    <td>{{ $car->price }}</td>
                                </tr>
                                <tr>
                                    <td>Start Date</td>
                                    <td>{{ $car->engine_size }}</td>
                                </tr>
                                <tr>
                                    <td>Image</td>
                                    <td>{{ $car->image_id }}</td>
                            </tbody>
                        </table>

                        <a href="{{ route('user.cars.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
