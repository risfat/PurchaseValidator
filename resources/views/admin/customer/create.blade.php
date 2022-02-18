@extends("layouts.admin_app")
@section('title', 'Add New Customer - ' . $site_name . ' | Admin Dashboard')
@section('content')



    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">
                <form action="{{ route('customer.store') }}" method="POST" enctype="multipart/form-data"
                    id="customer-form">
                    @csrf
                </form>
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a
                                            href="javascript: void(0);">{{ $site_name }}</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Customer</a></li>
                                    <li class="breadcrumb-item active">Add Customer</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Add Customer</h4>
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

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Customer Details</h5>

                                <div class="mb-3">
                                    <label for="customer-name" class="form-label">Customer Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="customer-name" name="name" form="customer-form"
                                        class="form-control" placeholder="e.g : MD Risfat" required>
                                </div>
                                <div class="mb-3">
                                    <label for="customer-email" class="form-label">Customer Email <span
                                            class="text-danger">*</span></label>
                                    <input type="email" id="customer-email" name="email" form="customer-form"
                                        class="form-control" placeholder="e.g : risfat@devtech365.com" required>
                                </div>
                                <div class="mb-3">
                                    <label for="customer-phone" class="form-label">Customer Phone <span
                                            class="text-danger">*</span></label>
                                    <input type="phone" id="customer-phone" name="phone" form="customer-form"
                                        class="form-control" placeholder="e.g : +880171234567" required>
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Customer Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" name="password" form="customer-form"
                                            class="form-control" placeholder="Enter password">
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="mb-2">Customer Status <span
                                            class="text-danger">*</span></label>
                                    <br />
                                    <div class="form-check mb-2 form-check-success">
                                        <input class="form-check-input rounded-circle" type="radio" id="inlineRadio1"
                                            value="1" name="status" form="customer-form" checked="">
                                        <label for="inlineRadio1"> Active </label>
                                    </div>
                                    <div class="form-check mb-2 form-check-danger">
                                        <input class="form-check-input rounded-circle" type="radio" id="inlineRadio2"
                                            value="0" name="status" form="customer-form">
                                        <label for="inlineRadio2"> Inactive </label>
                                    </div>
                                </div>

                                {{-- <div>
                                    <label class="form-label">Comment</label>
                                    <textarea class="form-control" rows="3" placeholder="Please enter comment"></textarea>
                                </div> --}}
                            </div>
                        </div> <!-- end card -->
                    </div> <!-- end col -->

                    <div class="col-lg-6">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">Customer Image</h5>

                                <div class="mb-3">
                                    <label for="customer-image" class="form-label">Customer Profile Picture</label>
                                    <input type="file" id="customer-image" name="image" form="customer-form"
                                        class="form-control">
                                </div>
                            </div>
                        </div> <!-- end col-->

                    </div> <!-- end col-->
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-12">
                        <div class="text-center mb-3">
                            <button type="button" onclick="window.history.back()"
                                class="btn w-sm btn-danger waves-effect waves-light">Cancel</button>
                            <button type="submit" id="submit-form" form="customer-form"
                                class="btn w-sm btn-success waves-effect waves-light">Save</button>
                        </div>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->



            </div> <!-- container -->

        </div> <!-- content -->



    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->




@endsection
