@include('common.header')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Cars List</h2>
            </div>
            <html>
   
   <head>
      <title>View Car Details</title>
  
   </head>  
   <body>  
   
<table border = "1">
<tr>
<td>Id</td>
<td>Model Name</td>
<td>ONEWAY KM COST</td>
<td>ROUND KM COST</td>
</tr>
@foreach ($cars as $car)
<tr>
<td>{{ $car->id }}</td>
<td>{{ $car->model_name }}</td>
<td>{{ $car->oneway_km_cost }}</td>
<td>{{ $car->round_km_cost }}</td>
</tr>
@endforeach

</body>
</html>
@endsection

@include('common.footer')