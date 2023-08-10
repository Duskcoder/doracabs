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
                            <h4 class="page-title">Bookings</h4>
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
                        <table id="dataTableId" class="table cell-border table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>From</th>
                                    <th>Destination</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Mobile</th>
                                    <th>Charge</th>
                                    <th>Distance</th>
                                    <th>Amount</th>
                                    <th>Depart</th>
                                    <th>Customer</th>
                                    <th>Email</th>
                                    <th>Return</th>
                                    <th>Days</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
            </div><!-- container -->

        
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
                ordering: false,
                ajax: {
                    url: "{{ route('booked-trips.search') }}",
                    data: function(d) {
                        d.search = $('input[type="search"]').val()
                    }
                },

                columns: [
                    {
                        data: 'from_place',
                        name: 'from_place',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'to_place',
                        name: 'to_place',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'oneway_round',
                        name: 'oneway_round',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'status',
                        name: 'status',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'cust_mbl',
                        name: 'cust_mbl',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'charge_per_km',
                        name: 'charge_per_km',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'distance',
                        name: 'distance',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'amount',
                        name: 'amount',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'depart_date_time',
                        name: 'depart_date_time',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'cust_name',
                        name: 'cust_name',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'cust_email',
                        name: 'cust_email',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'return_date_time',
                        name: 'return_date_time',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'days',
                        name: 'days',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },

                ]
            });
            $('#status').change(function() {
                table.draw();
            });
        });
        </script>
        @endsection