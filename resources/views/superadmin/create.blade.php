@extends('layouts.app')
@push('css-links')
    <!-- jvectormap -->
    <link href="{{ asset('theme/plugins/jvectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet">
    <!-- DataTables -->
    <link href="{{ asset('theme/plugins/datatables/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/plugins/datatables/buttons.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ asset('theme/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left ms-3">
                <h2>Add New Car</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('cars.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="ms-5">
            <div class="row">
                <div class="col-lg-3 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Model Name:</strong>
                        <input type="text" name="model_name" class="form-control" placeholder="Model Name:" required>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Oneway cost/km:</strong>
                        <input type="text" name="oneway_km_cost" class="form-control" placeholder="Oneway cost/km:"
                            required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Round cost/km:</strong>
                        <input type="text" name="round_km_cost" class="form-control" placeholder="Round cost/km:"
                            required>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Image:</strong>
                        <input type="file" name="image" class="form-control" placeholder=" Image" required>
                    </div>
                </div>
            </div>
            <div class="row ms-1">

                <label for="">Select Vehicle Type :</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="trip_type" id="flexRadioDefault1"value="oneway">
                    <label class="form-check-label" for="flexRadioDefault1">
                        OneWay
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="trip_type" id="flexRadioDefault1"value="round">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Round Trip
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="trip_type" id="flexRadioDefault2" checkedvalue="" value="both">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Both
                    </label>
                </div>
            </div>
                <div class="col-xs-12 col-sm-12 col-md-12 ">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
