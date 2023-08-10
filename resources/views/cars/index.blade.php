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
                            <h4 class="page-title">Vehicles</h4>
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
        <div class="col-12">
                @if ($message = Session::get('success'))
                <div class="alert alert-success border-0" role="alert">
                    <strong>Well done!</strong> {{ $message }}
                </div>
                @endif
                <!-- <a class=" btn btn-sm btn-primary btn-square" href="{{ route('cars.create') }}" role="button"><i
                        class="fas fa-plus me-2"></i>Add New Vehicle</a> -->
                <table id="dataTableId" class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Oneway Cost/km</th>
                            <th>Round Cost/km</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

            </div><!-- container -->

            <footer class="footer text-center text-sm-start">
                &copy; <script>
                document.write(new Date().getFullYear())
                </script> Dastone <span class="text-muted d-none d-sm-inline-block float-end">Crafted with <i
                        class="mdi mdi-heart text-danger"></i> by Mannatthemes</span>
            </footer>
            <!--end footer-->
        </div>
        @endsection
        @push('js-links')
        <!-- Required datatable js -->
        <script src="{{asset('theme/datatable/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('theme/datatable/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
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
        <script src="{{ asset('theme/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('theme/assets/pages/jquery.datatable.init.js') }}"></script>
        @endpush
        @section('js-content')
        <script type="text/javascript">
        $(function() {
            var table = $('#dataTableId').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 5,
                lengthChange: false,
                responsive: true,
                ajax: {
                    url: "{{ route('cars.search') }}",
                    data: function(d) {
                        d.status = $('#status').val(),
                            d.search = $('input[type="search"]').val()
                    }
                },
                columns: [{
                        data: 'model_name',
                        name: 'model_name',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'oneway_km_cost',
                        name: 'oneway_km_cost',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'round_km_cost',
                        name: 'round_km_cost',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
            $('#status').change(function() {
                table.draw();
            });
        });
        </script>
        @endsection