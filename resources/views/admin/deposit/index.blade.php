@extends('layouts.admin_app')
@section('title', 'Deposits - ' .  $site_name . ' | Admin Dashboard')
@section('content')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>



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
                                            href="javascript: void(0);">{{  $site_name }}</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Transactions</a></li>
                                    <li class="breadcrumb-item active">Deposits</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Deposits</h4>
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
                                                    <option value="filter[deposits.payer_name]">Customer Name</option>
                                                    <option value="filter[deposits.payer_email]">Customer Email</option>
                                                    <option value="filter[deposits.payer_phone]">Customer Phone</option>
                                                    <option value="filter[deposits.payment_method]">Payment Method</option>
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


                                            {{-- <label for="status-select" class="me-2">Status</label>
                                            <div class="me-sm-3">
                                                <select class="form-select form-select my-1 my-lg-0" id="status-select"
                                                    onchange="location = this.value;">
                                                    <option selected>Choose...</option>
                                                    <option value="{{ route('order.completed') }}">Completed</option>
                                                    <option value="{{ route('order.processing') }}">Processing</option>
                                                    <option value="{{ route('order.pending') }}">Pending</option>
                                                    <option value="{{ route('order.cancelled') }}">Cancelled</option>
                                                </select>
                                            </div> --}}
                                        </form>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="text-lg-end">
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#new-deposit-modal"
                                                class="btn btn-danger waves-effect waves-light mb-2 me-2"><i
                                                    class="mdi mdi-basket me-1"></i> Add New Deposit</button>
                                            <button type="button" class="btn btn-light waves-effect mb-2">Export</button>
                                        </div>
                                    </div><!-- end col-->
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-centered table-nowrap mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                {{-- <th style="width: 20px;">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="customCheck1">
                                                        <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                                    </div>
                                                </th> --}}
                                                <th>Deposit ID</th>
                                                <th>Payer Name</th>
                                                <th>Payer Phone</th>
                                                <th>Payer Email</th>
                                                <th>Date</th>
                                                <th>Payment Method</th>
                                                <th>Amount</th>
                                                <th>Deposit Status</th>
                                                <th style="width: 125px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @forelse ($deposits as $deposit)

                                                <tr>
                                                    {{-- <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="customCheck2">
                                                        <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                                    </div>
                                                </td> --}}
                                                    <td><a href="{{ route('deposit.details', $deposit->id) }}"
                                                            class="text-body fw-bold">#DS-{{ $deposit->id }}</a></td>
                                                    </td>
                                                    <td>
                                                        {{ $deposit->payer_name }}
                                                    </td>
                                                    <td>
                                                        {{ $deposit->payer_phone }}
                                                    </td>
                                                    <td>
                                                        {{ $deposit->payer_email }}
                                                    </td>
                                                    <td>
                                                        {{ date('F j, Y', strtotime($deposit->created_at)) }} <small
                                                            class="text-muted">{{ date('g:i a', strtotime($deposit->created_at)) }}</small>
                                                    </td>
                                                    <td>
                                                        {{ $deposit->payment_method }}
                                                    </td>
                                                    <td>
                                                        ৳
                                                        {{ $deposit->payment_amount }}
                                                    </td>

                                                    <td>
                                                        <h5>
                                                            @if ($deposit->status == 'pending')

                                                            <span class="badge bg-warning">PENDING</span>

                                                            @elseif ($deposit->status == 'processing')

                                                                <span class="badge bg-info">PROCESSING</span>

                                                            @elseif ($deposit->status == 'completed')

                                                                <span class="badge bg-success">COMPLETED</span>

                                                            @elseif ($deposit->status == 'cancelled')

                                                                <span class="badge bg-danger">CANCELLED</span>

                                                            @endif
                                                        </h5>
                                                    </td>
                                                    <td>
                                                        <a href="javascript: void(0);" class="action-icon"
                                                            id="deposit-details" data-bs-toggle="modal"
                                                            data-bs-target="#view-deposit-modal"
                                                            data-attr="{{ route('ajax.deposit', $deposit->id) }}"> <i
                                                                class="mdi mdi-eye"></i></a>
                                                        <a href="{{ route('deposit.details', $deposit->id) }}"
                                                            class="action-icon"> <i
                                                                class="mdi mdi-square-edit-outline"></i></a>
                                                        <a href="{{ route('deposit.delete', $deposit->id) }}"
                                                            class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                    </td>
                                                </tr>

                                            @empty

                                                <tr>
                                                    <td colspan="9" class="text-center">
                                                        <h5 class="text-muted">No Deposits Found</h5>
                                                    </td>

                                                </tr>

                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>
{{--
                                <ul class="pagination pagination-rounded justify-content-end my-2">
                                    {{ $deposits->links('pagination::bootstrap-4') }}
                                </ul> --}}
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col -->
                </div>
                <!-- end row -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
                                integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
                                crossorigin="anonymous" referrerpolicy="no-referrer"></script>


                <script type="text/javascript">
                    // display a modal (medium modal)
                    $(document).on('click', '#deposit-details', function(event) {
                        event.preventDefault();
                        let href = $(this).attr('data-attr');
                        $.ajax({
                            type: "GET",
                            dataType: 'json',
                            url: href,

                            success: function(data) {
                                $("#modal-title").text(data.id);
                                $("#total-amount").text(data.payment_amount);
                                $("#total-amount0").text(data.payment_amount);
                                $("#total-amount1").text(data.payment_amount);
                                $("#total-amount2").text(data.payment_amount);
                                $("#total-amount3").text(data.payment_amount);

                                $("#payer-name").text(data.payer_name);
                                $("#payer-phone").text(data.payer_phone);
                                $("#payer-email").text(data.payer_email);

                                $("#payment-method").text(data.payment_method);
                                $("#ac-number").text(data.account_number);
                                $("#trx-id").text(data.trx_id);


                                if (data.status == 'completed') {
                                    var status = '<span class="badge bg-success"> COMPLETED </span>';
                                } else if (data.status == 'processing') {
                                    var status = '<span class="badge bg-info"> PROCESSING </span>';
                                } else if (data.status == 'pending') {
                                    var status = '<span class="badge bg-warning"> PENDING </span>';
                                } else if (data.status == 'cancelled') {
                                    var status = '<span class="badge bg-danger"> CANCELLED </span>';
                                }

                                $("#deposit-status").html(status);

                                var name = document.querySelector('input[name=deposit_id]');
                                name.value = data.id;


                                console.log(data);
                            }

                        })
                    });
                </script>


                <!-- View deposit modal content -->

                <div id="view-deposit-modal" class="modal fade" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">


                            <form action="{{ route('deposit.update.ajax') }}" method="POST">
                                @csrf
                                <div class="modal-header">
                                    <h4 class="modal-title">#DS-0<span id="modal-title"> </span></h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body p-4">

                                    <div class="card">
                                        <h5 class="card-header">Deposit Details</h5>
                                        <div class="card-body">



                                            <div class="table-responsive">
                                                <table class="table table-bordered table-centered mb-0">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th>Deposit Information</th>
                                                            <th>Price</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row"> <span id="total-amount0"></span> Taka</th>
                                                            <td> <span id="total-amount1"></span> </td>
                                                            <td>
                                                                <div class="fw-bold">
                                                                    ৳
                                                                    <span id="total-amount2"></span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" colspan="2" class="text-end">Total :</th>
                                                            <td>
                                                                <div class="fw-bold">
                                                                    ৳
                                                                    <span id="total-amount3"></span>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>



                                        </div>
                                    </div>


                                    <div class="card">
                                        <h5 class="card-header">Payment Details</h5>
                                        <div class="card-body">

                                            <div class="row">

                                                <div class="col-md-6">

                                                    <ul class="list-unstyled mb-0">
                                                        <li>
                                                            <p class="mb-2"><span class="fw-semibold me-2">Payment
                                                                    Method:</span>
                                                                <span id="payment-method"></span>
                                                            </p>

                                                            <p class="mb-2"><span class="fw-semibold me-2">Account
                                                                    Number:</span>
                                                                <span id="ac-number"> </span>
                                                            </p>

                                                            <p class="mb-2"><span
                                                                    class="fw-semibold me-2">TrxID:</span>
                                                                <span id="trx-id"> </span>
                                                            </p>

                                                            <p class="mb-2"><span class="fw-semibold me-2">Payable
                                                                    Amount:</span>
                                                                    ৳ <span
                                                                    id="total-amount"> </span></p>
                                                            <p class="mb-0"><span class="fw-semibold me-2">Payment
                                                                    Status:</span>
                                                                <span id="deposit-status"> </span>
                                                            </p>

                                                        </li>

                                                    </ul>

                                                </div>
                                                <div class="col-md-6">

                                                    <ul class="list-unstyled mb-0">
                                                        <li>

                                                            <p class="mb-2"><span class="fw-semibold me-2">Payer Name:</span>
                                                                <span id="payer-name"> </span>
                                                            </p>
                                                            <p class="mb-2"><span class="fw-semibold me-2">Payer Phone:</span>
                                                                <span id="payer-phone"> </span>
                                                            </p>
                                                            <p class="mb-2"><span class="fw-semibold me-2">Payer Email:</span>
                                                                <span id="payer-email"> </span>
                                                            </p>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" name="deposit_id" value="" />
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary waves-effect"
                                        data-bs-dismiss="modal">Close</button>
                                    {{-- <button type="submit" class="btn btn-info waves-effect waves-light">Update
                                        Deposit</button> --}}
                                </div>

                            </form>
                        </div>
                    </div>
                </div><!-- /.modal -->


                <!-- Add Deposit Moddal -->
{{--
                <div id="new-deposit-modal" class="modal fade" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">


                            <form action="{{ route('deposit.create') }}" method="POST">
                                @csrf
                                <div class="modal-header">
                                    <h4 class="modal-title">Add New Deposit</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body p-4">

                                    <div class="card">
                                        <h5 class="card-header">Deposit Details</h5>
                                        <div class="card-body">


                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="amount">Amount</label>
                                                        <select class="form-select" id="amount" name="amount">
                                                            <option selected="">Select Amount</option>
                                                            <option value="100">৳
                                                                100</option>
                                                            <option value="200">৳
                                                                200</option>
                                                            <option value="300">৳
                                                                300</option>
                                                            <option value="400">৳
                                                                400</option>
                                                            <option value="500">৳
                                                                500</option>
                                                            <option value="600">৳
                                                                600</option>
                                                            <option value="700">৳
                                                                700</option>
                                                            <option value="800">৳
                                                                800</option>
                                                            <option value="900">৳
                                                                900</option>
                                                            <option value="1000">৳
                                                                1000</option>
                                                            <option value="2000">৳
                                                                2000</option>
                                                            <option value="3000">৳
                                                                3000</option>
                                                            <option value="4000">৳
                                                                4000</option>
                                                            <option value="5000">৳
                                                                5000</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="payment_method">Amount
                                                            (Manually)</label>
                                                        <input type="number" name="amount" class="form-control"
                                                            placeholder="Enter Amount Manually if You Want.">
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>


                                    <div class="card">
                                        <h5 class="card-header">Customer/Payment Details</h5>
                                        <div class="card-body">


                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="customer_id">Customer
                                                            Information</label>
                                                        <select name="customer_id" id="customer_id"
                                                            class="form-control select2">
                                                            <option value="">Select Customer</option>
                                                            @foreach ($customers as $customer)
                                                                <option value="{{ $customer->id }}">
                                                                    {{ $customer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="payment_method">Payment
                                                            Method</label>
                                                        <select name="payment_method" id="payment_method"
                                                            class="form-control select2">
                                                            <option value="">Select Payment Method</option>
                                                            <option value="cash">Cash</option>
                                                            <option value="card">Card</option>
                                                            <option value="bkash">Bkash</option>
                                                            <option value="rocket">Rocket</option>
                                                            <option value="wallet">Wallet</option>
                                                            <option value="other">Others</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>



                                    <div class="card">
                                        <h5 class="card-header">Deposit Actions</h5>
                                        <div class="card-body">

                                            <div class="row">

                                                <div class="col-md-6">
                                                    <h5 class="mb-3">Mark Payment As</h5>
                                                    <div class="row">
                                                        <div class="col-md-6">

                                                            <div class="form-check mb-2 form-check-success">
                                                                <input class="form-check-input" type="radio"
                                                                    name="payment_status" value="paid" id="customradio2">
                                                                <label class="form-check-label"
                                                                    for="customradio2">Paid</label>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-6">

                                                            <div class="form-check mb-2 form-check-info">
                                                                <input class="form-check-input" type="radio"
                                                                    name="payment_status" value="pending" id="customradio3">
                                                                <label class="form-check-label"
                                                                    for="customradio3">Pending</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">

                                                        <div class="col-md-6">

                                                            <div class="form-check mb-2 form-check-warning">
                                                                <input class="form-check-input" type="radio"
                                                                    name="payment_status" value="unpaid" id="customradio4">
                                                                <label class="form-check-label"
                                                                    for="customradio4">Unpaid</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">

                                                            <div class="form-check mb-2 form-check-danger">
                                                                <input class="form-check-input" type="radio"
                                                                    name="payment_status" value="failed" id="customradio5">
                                                                <label class="form-check-label"
                                                                    for="customradio5">Failed</label>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-md-6">
                                                    <h5 class="mb-3">Mark Order As</h5>
                                                    <div class="row">
                                                        <div class="col-md-6">

                                                            <div class="form-check mb-2 form-check-success">
                                                                <input class="form-check-input" type="radio" name="status"
                                                                    value="completed" id="customradio6">
                                                                <label class="form-check-label"
                                                                    for="customradio6">Completed</label>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-6">

                                                            <div class="form-check mb-2 form-check-info">
                                                                <input class="form-check-input" type="radio" name="status"
                                                                    value="processing" id="customradio7">
                                                                <label class="form-check-label"
                                                                    for="customradio7">Processing</label>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="row">

                                                        <div class="col-md-6">

                                                            <div class="form-check mb-2 form-check-warning">
                                                                <input class="form-check-input" type="radio" name="status"
                                                                    value="pending" id="customradio8">
                                                                <label class="form-check-label"
                                                                    for="customradio8">Pending</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">

                                                            <div class="form-check mb-2 form-check-danger">
                                                                <input class="form-check-input" type="radio" name="status"
                                                                    value="cancelled" id="customradio9">
                                                                <label class="form-check-label"
                                                                    for="customradio9">Cancelled</label>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary waves-effect"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-info waves-effect waves-light">Add
                                        Deposit</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div> --}}


            </div> <!-- container -->

        </div> <!-- content -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


@endsection
