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
<div class="page-content">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Edit Vehicle Information</h4>
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
                <div class="card">
                    <div class="card-body">
                        @if (count($errors) > 0)
                        <div class="alert alert-danger border-0" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                {!! Form::model($data, ['method' => 'PATCH','route' => ['cars.update', $data->id],'enctype'=>'multipart/form-data']) !!}
                    @include('cars.fields') 
                    {!! Form::close() !!}  
                    </div>
                    <!--end card-body-->
                </div>
            </div>
        </div>
    </div><!-- container -->
    @include('common.footer') 
</div>
@endsection
@push('js-links')
<!-- Required datatable js -->
<script src="{{ asset('theme/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('theme/plugins/datatables/dataTables.bootstrap5.min.js') }}"></script>
<!-- Buttons examples -->
<script src="{{ asset('theme/plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('theme/plugins/datatables/buttons.bootstrap5.min.js') }}"></script>
<script src="{{ asset('theme/plugins/datatables/jszip.min.js') }}"></script>
<script src="{{ asset('theme/plugins/datatables/pdfmake.min.js') }}"></script>
<script src="{{ asset('theme/plugins/datatables/vfs_fonts.js') }}"></script>
<script src="{{ asset('theme/plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('theme/plugins/datatables/buttons.print.min.js') }}"></script>
<script src="{{ asset('theme/plugins/datatables/buttons.colVis.min.js') }}"></script>
<!-- Responsive examples -->
<script src="{{ asset('theme/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('theme/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('theme/assets/pages/jquery.datatable.init.js') }}"></script>
@endpush