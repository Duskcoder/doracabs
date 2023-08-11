<div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col">
                <h4 class="card-title">Booking Information</h4>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end card-header-->
    <div class="card-body">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="form-group">
                    <strong class="required">From:</strong>
                    {!! Form::text('from_place', null, array('placeholder' => 'From','class' =>
                    'form-control','readonly'=>true)) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="form-group">
                    <strong class="required">To:</strong>
                    {!! Form::text('to_place', null, array('placeholder' => 'To','class' =>
                    'form-control','readonly'=>true)) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="form-group">
                    <strong class="required">Type:</strong>
                    {!! Form::text('oneway_round', null, array('placeholder' => 'Type','class' =>
                    'form-control','readonly'=>true)) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="form-group">
                    <strong class="required">Charge:</strong>
                    {!! Form::text('charge_per_km', null, array('placeholder' => 'Charge','class' =>
                    'form-control','readonly'=>true)) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="form-group">
                    <strong class="required">Distance:</strong>
                    {!! Form::text('distance', null, array('placeholder' => 'Km','class' =>
                    'form-control','readonly'=>true)) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="form-group">
                    <strong class="required">Amount:</strong>
                    {!! Form::text('amount', null, array('placeholder' => 'Amount','class' =>
                    'form-control','readonly'=>true)) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="form-group">
                    <strong class="required">Depart:</strong>
                    {!! Form::text('depart_date_time', null, array('placeholder' => 'Time','class' =>
                    'form-control','readonly'=>true)) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="form-group">
                    <strong class="required">Name:</strong>
                    {!! Form::text('cust_name', null, array('placeholder' => 'Name','class' =>
                    'form-control','readonly'=>true)) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="form-group">
                    <strong class="required">Mobile:</strong>
                    {!! Form::text('cust_mbl', null, array('placeholder' => 'Mobile','class' =>
                    'form-control','readonly'=>true)) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="form-group">
                    <strong class="required">Email:</strong>
                    {!! Form::text('cust_email', null, array('placeholder' => 'Email','class' =>
                    'form-control','readonly'=>true)) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="form-group">
                    <strong class="required">Pickup Address:</strong>
                    {!! Form::text('pickup_add', null, array('placeholder' => 'Pickup Address','class' =>
                    'form-control','readonly'=>true)) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="form-group">
                    <strong class="required">Drop Address:</strong>
                    {!! Form::text('drop_add', null, array('placeholder' => 'Drop Address','class' =>
                    'form-control','readonly'=>true)) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="form-group">
                    <strong class="required">Status:</strong>
                    {!! Form::select('status', array('0' => 'Pending', '1' => 'Booked', '2' => 'Boarded', '3' => 'Completed', '4' => 'Cancelled'), $bookedData->status, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
    </div>
    <!--end card-body-->
</div>
<div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col">
                <h4 class="card-title">Payment Information</h4>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end card-header-->
    <div class="card-body">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="form-group">
                    <strong class="required">Initial Payment:</strong>
                    {!! Form::text('initial_payment', $bookedData->payment->initial_payment, array('placeholder' => 'Initial Payment','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="form-group">
                    <strong class="required">Driver Bata:</strong>
                    {!! Form::text('driver_bata', $bookedData->payment->driver_bata, array('placeholder' => 'Driver Bata','class' => 'form-control'))
                    !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="form-group">
                    <strong class="required">Toll:</strong>
                    {!! Form::text('toll', $bookedData->payment->toll, array('placeholder' => 'Toll','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="form-group">
                    <strong class="required">Parking:</strong>
                    {!! Form::text('parking', $bookedData->payment->parking, array('placeholder' => 'Parking','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong class="required">Note:</strong>
                    {!! Form::textarea('$bookedData->payment->note',$bookedData->payment->note,['class'=>'form-control', 'rows' => 2, 'name' => 'note']) !!}
                </div>
            </div>
        </div>
    </div>
    <!--end card-body-->
</div>
<div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col">
                <h4 class="card-title">Driver Information</h4>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end card-header-->
    <div class="card-body">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="form-group">
                    <strong class="required">Driver Name:</strong>
                    {!! Form::text('driver_name', $bookedData->driver->driver_name, array('placeholder' => 'Driver Name','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="form-group">
                    <strong class="required">Licence Number:</strong>
                    {!! Form::text('licence_number', $bookedData->driver->licence_number, array('placeholder' => 'Licence Number','class' => 'form-control'))
                    !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="form-group">
                    <strong class="required">Age:</strong>
                    {!! Form::text('age', $bookedData->driver->age, array('placeholder' => 'Age','class' => 'form-control')) !!}
                </div>
            </div>
        </div>
    </div>
    <!--end card-body-->
</div>
<div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col">
                <h4 class="card-title">Vehicle Information</h4>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end card-header-->
    <div class="card-body">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="form-group">
                    <strong class="required">Vehicle Name:</strong>
                    {!! Form::text('vehicle_name', $bookedData->vehicle->vehicle_name, array('placeholder' => 'Vehicle Name','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="form-group">
                    <strong class="required">Vehicle Number:</strong>
                    {!! Form::text('vehicle_number', $bookedData->vehicle->vehicle_number, array('placeholder' => 'Vehicle Number','class' => 'form-control'))
                    !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="form-group">
                    <strong class="required">Vehicle seats:</strong>
                    {!! Form::text('vehicle_seats', $bookedData->vehicle->vehicle_seats, array('placeholder' => 'Number of seats','class' => 'form-control')) !!}
                </div>
            </div>
        </div>
    </div>
    <!--end card-body-->
</div>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="button-items">
                    <a class="btn btn-secondary btn-square" href="{{ route('booked-trips.index') }}"> Back</a>
                    <button type="submit" class="btn btn-primary btn-square">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>