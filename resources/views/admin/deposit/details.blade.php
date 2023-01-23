@extends('layouts.admin_app')
@section('title', 'Deposit Details - ' . $site_name . ' | Admin Dashboard')
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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Deposit</a></li>
                                    <li class="breadcrumb-item active">Deposit Detail</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Deposit Detail</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-3">Track Deposit</h4>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-4">
                                            <h5 class="mt-0">Deposit ID:</h5>
                                            <p>#DS-0{{ $deposit->id }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-4">
                                            <h5 class="mt-0">Tracking ID:</h5>
                                            <p>0000000000{{ $deposit->id }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="track-order-list">
                                    <ul class="list-unstyled">
                                        <li class="completed">
                                            <h5 class="mt-0 mb-1">Order Placed</h5>
                                            <p class="text-muted">
                                                {{ date('F j, Y', strtotime($deposit->created_at)) }}
                                                <small
                                                    class="text-muted">{{ date('g:i a', strtotime($deposit->created_at)) }}
                                                </small>
                                            </p>
                                        </li>
                                        <li class="@if ($deposit->status == 'completed') completed @endif">
                                            @if ($deposit->payment_status == 'pending')
                                                <span class="active-dot dot"></span>
                                            @endif

                                            <h5 class="mt-0 mb-1">Paid</h5>
                                            <p class="text-muted">
                                                {{ date('F j, Y', strtotime($deposit->created_at)) }}
                                                <small
                                                    class="text-muted">{{ date('g:i a', strtotime($deposit->created_at)) }}
                                                </small>
                                            </p>
                                        </li>

                                    </ul>

                                    <div class="text-center mt-4">
                                        <a href="#deposit_details" class="btn btn-primary">Show Details</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">


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

                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-3">Items from Deposit #DS-0{{ $deposit->id }}</h4>

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
                                                <th scope="row">{{ $deposit->payment_amount - $deposit->charge }} Taka
                                                </th>
                                                <td>{{ $deposit->payment_amount }}</td>
                                                <td>{{ $deposit->payment_amount }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" colspan="2" class="text-end">Sub Total :</th>
                                                <td>
                                                    <div class="fw-bold">৳ {{ $deposit->payment_amount }}</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row" colspan="2" class="text-end">Coupon Used :</th>
                                                <td>
                                                    ৳ 0.00
                                                </td>
                                            </tr>
                                            {{-- <tr>
                                                <th scope="row" colspan="4" class="text-end">Estimated Tax :</th>
                                                <td>$12</td>
                                            </tr> --}}
                                            <tr>
                                                <th scope="row" colspan="2" class="text-end">Total :</th>
                                                <td>
                                                    <div class="fw-bold"> ৳
                                                        {{ $deposit->payment_amount }}</div>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div id="deposit_details" class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-3">Customer Information</h4>

                                <h5 class="font-family-primary fw-semibold">{{ $deposit->payer_name }}</h5>

                                <p class="mb-2"><span class="fw-semibold me-2">Email:</span>
                                    {{ $deposit->payer_email }}</p>
                                <p class="mb-2"><span class="fw-semibold me-2">Phone:</span>
                                    {{ $deposit->payer_phone }}</p>

                            </div>
                        </div>
                    </div> <!-- end col -->

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-3">Deposit/Payment Information</h4>

                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <p class="mb-2"><span class="fw-semibold me-2">Payment Method:</span>
                                            {{ $deposit->payment_method }}</p>
                                        <p class="mb-2"><span class="fw-semibold me-2">Account
                                                Number:</span>{{ $deposit->account_number }}
                                        </p>
                                        <p class="mb-2"><span class="fw-semibold me-2">TrxID:</span>
                                            {{ $deposit->trx_id }}</p>
                                        <p class="mb-2"><span class="fw-semibold me-2">Payment Amount:</span>
                                            ৳ {{ $deposit->payment_amount }}</p>
                                        <p class="mb-0"><span class="fw-semibold me-2">Deposit Status:</span>

                                            @if ($deposit->status == 'pending')

                                                <span class="badge bg-warning">PENDING</span>

                                            @elseif ($deposit->status == 'processing')

                                                <span class="badge bg-info">PROCESSING</span>

                                            @elseif ($deposit->status == 'completed')

                                                <span class="badge bg-success">COMPLETED</span>

                                            @elseif ($deposit->status == 'cancelled')

                                                <span class="badge bg-danger">CANCELLED</span>

                                            @endif
                                        </p>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div> <!-- end col -->

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">

                                <form action="{{ route('deposit.update', $deposit->id) }}" method="POST">
                                    @csrf

                                    <div class="row">



                                            <div class="card bg-secondary text-white">
                                                <div class="card-body">
                                                    <h5 class="card-title text-white">Mark Deposit As</h5>
                                                    <div class="text-center">
                                                        <div class="button-list">

                                                            <button type="submit" name="status" value="completed"
                                                                class="btn btn-success rounded-pill waves-effect waves-light">
                                                                <span class="btn-label"><i
                                                                        class="mdi mdi-check-all"></i></span>Completed
                                                            </button>

                                                            <button type="submit" name="status" value="processing"
                                                                class="btn btn-info rounded-pill waves-effect waves-light">
                                                                <span class="btn-label"><i
                                                                        class="mdi mdi-alert-circle-outline"></i></span>Processing
                                                            </button>

                                                            <button type="submit" name="status" value="pending"
                                                                class="btn btn-warning rounded-pill waves-effect waves-light">
                                                                <span class="btn-label"><i class="mdi mdi-alert"></i></span>Pending
                                                            </button>

                                                            <button type="submit" name="status" value="cancelled"
                                                                class="btn btn-danger rounded-pill waves-effect waves-light">
                                                                <span class="btn-label"><i
                                                                        class="mdi mdi-close-circle-outline"></i></span>Canel
                                                            </button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                    </div>

                                </form>


                            </div>
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
