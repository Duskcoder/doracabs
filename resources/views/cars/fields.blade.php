<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-3">
        <div class="form-group">
            <strong class="required">Model/Name:</strong>
            {!! Form::text('model_name', null, array('placeholder' => 'Name','class' => 'form-control','readonly'=>true)) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3">
        <div class="form-group">
            <strong class="required">Oneway cost/km:</strong>
            {!! Form::text('oneway_km_cost', null, array('placeholder' => 'Type','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3">
        <div class="form-group">
            <strong class="required">Round cost/km:</strong>
            {!! Form::text('round_km_cost', null, array('placeholder' => 'Type','class' => 'form-control')) !!}
        </div>
    </div>
        <!-- <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="form-group">
                <strong class="required">Image:</strong>
                {!! Form::file('image', array('class' => 'file form-control'))  !!}
            </div>
        </div> -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <a class="btn btn-secondary btn-square" href="{{ route('cars.index') }}"> Back</a>
            <button type="submit" class="btn btn-primary btn-square">Save</button>
        </div>
    </div>