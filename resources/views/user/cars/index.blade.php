@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Cars</div>

                <div class="card-body">
                    @if (count($cars)=== 0)
                        <p>There are no Cars</p>
                    @else
                        <table id="table-cars" class="table table-hover">
                            <thead>
                                <th>Make</th>
                                <th>Model</th>
                                <th>Price</th>
                                <th>Engine Size</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach ($cars as $car)
                                <tr data-id="{{ $car->id }}">
                                    <td>{{ $car->make }}</td>
                                    <td>{{ $car->model }}</td>
                                    <td>{{ $car->price }}</td>
                                    <td>{{ $car->engine_size }}</td>

                                    <td>
                                        <a href="{{ route('user.cars.show', $car->id) }}" class="btn btn-primary">View</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
