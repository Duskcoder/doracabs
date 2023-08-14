@extends('layouts.app')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <!-- <h4 class="page-title">Edit booking</h4> -->
                            <!-- <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('cars.index') }}">Cars</a></li>
                                <li class="breadcrumb-item active">Edit car</li>
                            </ol> -->
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-sm-12">
                @if (count($errors) > 0)
                <div class="alert alert-danger border-0" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error )
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                {!! Form::model($bookedData, ['method' => 'PATCH','route' => ['booked-trips.update', $bookedData->id],'enctype'=>'multipart/form-data']) !!}
                    @include('booked-trips.fields') 
                    {!! Form::close() !!}   
        </div>
    </div><!-- container -->
    @include('common.footer') 
</div>
@endsection
