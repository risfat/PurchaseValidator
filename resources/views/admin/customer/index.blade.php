@extends('layouts.admin_app')
@section('title', 'Customers - ' . $site_name . ' | Admin Dashboard')

@push('styles')

    <!-- third party css -->
    <link href="{{ asset('admin/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- third party css end -->

@endpush
@section('content')

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a
                                            href="javascript: void(0);">{{ $site_name }}</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                    <li class="breadcrumb-item active">Customers</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Customers</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-sm-4">
                                        <a href="{{ route('customer.create') }}" class="btn btn-danger mb-2"><i
                                                class="mdi mdi-plus-circle me-2"></i> Add Customers</a>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="text-sm-end">
                                            <button type="button" class="btn btn-success mb-2 me-1"><i
                                                    class="mdi mdi-cog"></i></button>
                                            <button type="button" class="btn btn-light mb-2 me-1">Import</button>
                                            <button type="button" class="btn btn-light mb-2">Export</button>
                                        </div>
                                    </div><!-- end col-->
                                </div>


                                @if (Session::has('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="table-responsive">
                                    <table class="table table-centered table-striped dt-responsive nowrap w-100"
                                        id="products-datatable">
                                        <thead>
                                            <tr>
                                                <th style="width: 20px;">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="customCheck1">
                                                        <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                                    </div>
                                                </th>
                                                <th>Customer</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Total License</th>
                                                <th>Joined At</th>
                                                <th>Status</th>
                                                <th style="width: 75px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($customers as $customer)


                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="customCheck2">
                                                            <label class="form-check-label"
                                                                for="customCheck2">{{ $customer->id }}</label>
                                                        </div>
                                                    </td>
                                                    <td class="table-user">
                                                        <img src="{{ url('uploads/images/profiles/' . $customer->image) }}"
                                                            alt="table-user" class="me-2 rounded-circle">
                                                        <a href="{{ route('customer.details', $customer->id) }}"
                                                            class="text-body fw-semibold">{{ $customer->name }}</a>
                                                    </td>
                                                    <td>{{ $customer->email }}</td>
                                                    <td>{{ !empty($customer->phone) ? $customer->phone : 'NULL' }}</td>
                                                    <td>
                                                        {{ !empty($customer->total_license) ? $customer->total_license : '0' }}
                                                    </td>
                                                    <td>
                                                        {{ date('F j, Y', strtotime($customer->created_at)) }} <small
                                                            class="text-muted">{{ date('g:i a', strtotime($customer->created_at)) }}</small>
                                                    </td>
                                                    <td>
                                                        @if ($customer->status == '1')
                                                            <span class="badge badge-soft-success">Active</span>
                                                        @else

                                                            <span
                                                                class="badge badge-badge badge-soft-danger">Inactive</span>

                                                        @endif
                                                    </td>

                                                    <td>
                                                        <a href="{{ route('customer.details', $customer->id) }}" class="action-icon"> <i
                                                                class="mdi mdi-square-edit-outline"></i></a>
                                                        <a href="{{ route('customer.delete', $customer->id) }}" class="action-icon">
                                                            <i class="mdi mdi-delete"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- container -->

        </div> <!-- content -->



    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->


@endsection

@push('scripts')

    <!-- third party js -->
    <script src="{{ asset('admin/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('admin/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('admin/libs/jquery-datatables-checkboxes/js/dataTables.checkboxes.min.js') }}"></script>
    <!-- third party js ends -->

    <!-- Datatables init -->
    <script src="{{ asset('admin/js/pages/customers.init.js') }}"></script>

@endpush
