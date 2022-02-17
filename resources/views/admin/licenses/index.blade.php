@extends('layouts.admin_app')
@section('title', 'Licenses - ' . $site_name . ' | Admin Dashboard')
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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{ $site_name }}</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                    <li class="breadcrumb-item active">Licenses</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Licenses</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->




                <div class="row">


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


                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-lg-8">
                                        <form method="GET" class="d-flex flex-wrap align-items-center">
                                            <label for="search-select" class="me-2">Search By</label>
                                            <div class="me-sm-3">
                                                <select class="form-select form-select my-1 my-lg-0" id="search-type">
                                                    <option selected value="filter[deposits.id]">Deposit ID</option>
                                                    <option value="filter[users.id]">Customer ID</option>
                                                    <option value="filter[users.name]">Customer Name</option>
                                                    <option value="filter[users.email]">Customer Email</option>
                                                    <option value="filter[users.phone]">Customer Phone</option>
                                                    <option value="filter[deposits.payment_method]">Payment Method
                                                    </option>
                                                </select>
                                            </div>

                                            <div class="me-3">
                                                <label class="visually-hidden">Search</label>
                                                <div class="input-group">
                                                    <input type="search" name="filter[deposits.id]" id="search-input"
                                                        class="form-control" placeholder="Search..." aria-label="Search">
                                                    <button class="btn input-group-text btn-dark waves-effect waves-light"
                                                        type="button">Search</button>
                                                </div>
                                            </div>

                                            <script type="text/javascript">
                                                $('#search-type').on('change', function() {
                                                    $('#search-input').attr('name', $(this).val());
                                                });
                                            </script>
                                        </form>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="text-lg-end">
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#new-license-modal"
                                                class="btn btn-danger waves-effect waves-light mb-2 me-2"><i
                                                    class="mdi mdi-basket me-1"></i> Add New License</button>
                                            <button type="button" class="btn btn-light waves-effect mb-2">Export</button>
                                        </div>
                                    </div><!-- end col-->
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-centered table-nowrap mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th>License ID</th>
                                                <th>Domain</th>
                                                <th>Product</th>
                                                <th>Customer</th>
                                                <th>Purchase Date</th>
                                                <th>Expiry Date</th>
                                                <th>License Status</th>
                                                <th style="width: 125px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @forelse ($licenses as $license)
                                                <tr>
                                                    {{-- <td>
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" id="customCheck2">
                                                            <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                                        </div>
                                                    </td> --}}
                                                    <td class="text-body fw-bold">{{ $license->id }}</td>
                                                    <td>
                                                        {{ $license->domain }}
                                                    </td>
                                                    <td>
                                                        {{ $license->product }}
                                                    </td>

                                                    <td>
                                                        {{ $license->customer }}
                                                    </td>
                                                    <td>
                                                        {{ date('F j, Y', strtotime($license->created_at)) }} <small
                                                            class="text-muted">{{ date('g:i a', strtotime($license->created_at)) }}</small>
                                                    </td>
                                                    <td>
                                                        {{ date('F j, Y', strtotime($license->expired_at)) }} <small
                                                            class="text-muted">{{ date('g:i a', strtotime($license->expired_at)) }}</small>
                                                    </td>


                                                    <td>
                                                        <h5>
                                                            @if ($license->status == 1)
                                                                <span class="badge bg-success">Active</span>

                                                            @else

                                                                <span class="badge bg-danger">Suspended</span>
                                                            @endif
                                                        </h5>
                                                    </td>
                                                    <td>
                                                        <a href="javascript: void(0);" class="action-icon"
                                                            id="license-details" data-bs-toggle="modal"
                                                            data-bs-target="#view-license-modal" data-attr="{{ $license->id }}"> <i
                                                                class="mdi mdi-eye"></i></a>
                                                        <a href="javascript: void(0);" class="action-icon" id="license-details" data-bs-toggle="modal"
                                                        data-bs-target="#edit-license-modal" data-attr="{{ $license->id }}"> <i
                                                                class="mdi mdi-square-edit-outline"></i></a>
                                                        <a href="{{ route('admin.license.delete',$license->id) }}" class="action-icon"> <i
                                                                class="mdi mdi-delete"></i></a>
                                                    </td>
                                                </tr>

                                            @empty

                                                <tr>
                                                    <td colspan="9" class="text-center">
                                                        <h5 class="text-muted">No Licenses Found</h5>
                                                    </td>

                                                </tr>
                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>

                                <ul class="pagination pagination-rounded justify-content-end my-2">
                                    {{-- {{ $deposits->links('pagination::bootstrap-4') }} --}}
                                </ul>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col -->
                </div>
                <!-- end row -->


                @include('admin.modals.view-license')

                @include('admin.modals.edit-license')

                @include('admin.modals.add-license')


            </div> <!-- container -->

        </div> <!-- content -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


@endsection
