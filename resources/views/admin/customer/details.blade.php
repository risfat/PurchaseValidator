@extends('layouts.admin_app')
@section('title', 'Customer Details - ' . $site_name . ' | Admin Dashboard')
@section('content')


    @php

    $name = trim($customer->name);
    $last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
    $first_name = trim( preg_replace('#'.preg_quote($last_name,'#').'#', '', $name ) );

    @endphp


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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Customers</a></li>
                                    <li class="breadcrumb-item active">Profile</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Profile</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-4 col-xl-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <img src="{{ url('uploads/images/profiles/' . $customer->image) }}"
                                    class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">

                                <h4 class="mb-0">{{ $last_name }}</h4>
                                <p class="text-muted"> {{ '@' . Auth::user()->roles->first()->display_name }} </p>

                                <button type="button"
                                    class="btn btn-success btn-xs waves-effect mb-2 waves-light">Follow</button>
                                <button type="button"
                                    class="btn btn-danger btn-xs waves-effect mb-2 waves-light">Message</button>

                                <div class="text-start mt-3">
                                    <h4 class="font-13 text-uppercase">Details :</h4>
                                    {{-- <p class="text-muted font-13 mb-3">
                                        Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since the
                                        1500s, when an unknown printer took a galley of type.
                                    </p> --}}
                                    <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span
                                            class="ms-2">{{ $customer->name }}</span></p>

                                    <p class="text-muted mb-2 font-13"><strong>Mobile :</strong><span
                                            class="ms-2">{{ !empty($customer->phone) ? $customer->phone : 'NULL' }}</span></p>

                                    <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span
                                            class="ms-2">{{ $customer->email }}</span></p>

                                    <p class="text-muted mb-1 font-13"><strong>Position :</strong> <span
                                            class="ms-2"> {{ Auth::user()->roles->first()->display_name }}
                                        </span></p>
                                </div>

                                <ul class="social-list list-inline mt-3 mb-0">
                                    <li class="list-inline-item">
                                        <a href="{{ $customer->fb_id }}" target="_blank"
                                            class="social-list-item border-primary text-primary"><i
                                                class="mdi mdi-facebook"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="{{ $customer->google_id }}" target="_blank"
                                            class="social-list-item border-danger text-danger"><i
                                                class="mdi mdi-google"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="{{ $customer->twitter_id }}" target="_blank"
                                            class="social-list-item border-info text-info"><i
                                                class="mdi mdi-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="{{ $customer->linkedin_id }}" target="_blank"
                                            class="social-list-item border-secondary text-secondary"><i
                                                class="mdi mdi-linkedin"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="{{ $customer->insta_id }}" target="_blank"
                                            class="social-list-item border-danger text-danger"><i
                                                class="mdi mdi-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div> <!-- end card -->
                    </div> <!-- end col-->

                    <div class="col-lg-8 col-xl-8">
                        <div class="card">
                            <div class="card-body">
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
                                <ul class="nav nav-pills nav-fill navtab-bg">

                                    <li class="nav-item">
                                        <a href="#about" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                                            About
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#settings" data-bs-toggle="tab" aria-expanded="false"
                                            class="nav-link">
                                            Edit Profile
                                        </a>
                                    </li>

                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane show active" id="about">

                                        <h5 class="mb-3 text-uppercase bg-light p-2"><i
                                                class="mdi mdi-account-circle me-1"></i>
                                            Personal Info</h5>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="firstname" class="form-label">First Name</label>
                                                    <input type="text" name="firstname" value="{{ $first_name }}"
                                                        class="form-control" id="firstname" placeholder="Enter first name"
                                                        disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="lastname" class="form-label">Last Name</label>
                                                    <input type="text" name="lastname" value="{{ $last_name }}"
                                                        class="form-control" id="lastname" placeholder="Enter last name"
                                                        disabled>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label for="phone" class="form-label">Phone</label>
                                                    <input type="text" name="phone" value="{{ $customer->phone }}"
                                                        class="form-control" id="phone" placeholder="NULL"
                                                        disabled>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="useremail" class="form-label">Email Address</label>
                                                    <input type="email" name="email" value="{{ $customer->email }}"
                                                        class="form-control" id="useremail" placeholder="NULL"
                                                        disabled>
                                                    {{-- <span class="form-text text-muted"><small>If you want to change
                                                                email please <a href="javascript: void(0);">click</a>
                                                                here.</small></span> --}}
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="userpassword" class="form-label">Password <span
                                                            class="required">*</span></label>
                                                    <input type="password" name="password"
                                                        value="{{ $customer->password }}" class="form-control"
                                                        id="userpassword" placeholder="Enter password" disabled>
                                                    {{-- <span class="form-text text-muted"><small>If you want to change
                                                                password please <a href="{{ route('password.request') }}">click</a>
                                                                here.</small></span> --}}
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->



                                        <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-earth me-1"></i>
                                            Licenses</h5>
                                        <div class="row">

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
                                                            <th>License ID</th>
                                                            <th>Product</th>
                                                            <th>Purchase Date</th>
                                                            <th>Expire Date</th>
                                                            <th>Status</th>
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
                                                                <td><a href="{{ route('license.details', $license->id) }}"
                                                                        class="text-body fw-bold">{{ $license->id }}</a>
                                                                </td>
                                                                </td>
                                                                <td>
                                                                    {{ $license->product->name }}
                                                                </td>
                                                                <td>
                                                                    {{ date('F j, Y', strtotime($license->created_at)) }}
                                                                    <small
                                                                        class="text-muted">{{ date('g:i a', strtotime($license->created_at)) }}</small>
                                                                </td>
                                                                <td>
                                                                    {{ date('F j, Y', strtotime($license->expired_at)) }}
                                                                    <small
                                                                        class="text-muted">{{ date('g:i a', strtotime($license->expired_at)) }}</small>
                                                                </td>

                                                                <td>
                                                                    <h5>
                                                                        @if ($license->status == 1)
                                                                            <span class="badge bg-success">Active</span>
                                                                        @else
                                                                            <span class="badge bg-danger">Inactive</span>
                                                                        @endif
                                                                    </h5>
                                                                </td>
                                                                <td>

                                                                    <a href="{{ route('license.details', $license->id) }}"
                                                                        class="action-icon"> <i
                                                                            class="mdi mdi-eye"></i></a>
                                                                    <a href="{{ route('admin.license.delete', $license->id) }}"
                                                                        class="action-icon"> <i
                                                                            class="mdi mdi-delete"></i></a>
                                                                </td>
                                                            </tr>

                                                        @empty

                                                            <tr>
                                                                <td colspan="8" class="text-center">
                                                                    <h5>No Licenses found</h5>
                                                                </td>
                                                            </tr>

                                                        @endforelse

                                                    </tbody>
                                                </table>
                                                <ul class="pagination pagination-rounded justify-content-end my-2">
                                                    {{ $licenses->links('pagination::bootstrap-4') }}
                                                </ul>
                                            </div>
                                        </div> <!-- end row -->

                                        <h5 class="mb-3 text-uppercase bg-light p-2"><i
                                                class="mdi mdi-office-building me-1"></i> Customer Status</h5>
                                        <div class="row">

                                            <div class="mb-3">
                                                <div class="text-center">
                                                    @if ($customer->status == 1)
                                                        <button type="button"
                                                            class="btn btn-success rounded-pill waves-effect waves-light">Active</button>
                                                    @else
                                                        <button type="button"
                                                            class="btn btn-danger rounded-pill waves-effect waves-light">Inactive</button>
                                                    @endif
                                                </div>
                                            </div>


                                        </div> <!-- end row -->
                                    </div>



                                    <div class="tab-pane" id="settings">
                                        <form action="{{ route('customer.update', $customer->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <h5 class="mb-3 text-uppercase bg-light p-2"><i
                                                    class="mdi mdi-account-circle me-1"></i>
                                                Personal Info</h5>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="firstname" class="form-label">First Name</label>
                                                        <input type="text" name="firstname" value="{{ $first_name }}"
                                                            class="form-control" id="firstname"
                                                            placeholder="Enter first name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="lastname" class="form-label">Last Name</label>
                                                        <input type="text" name="lastname" value="{{ $last_name }}"
                                                            class="form-control" id="lastname"
                                                            placeholder="Enter last name">
                                                    </div>
                                                </div> <!-- end col -->
                                            </div> <!-- end row -->

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="phone" class="form-label">Phone</label>
                                                        <input type="text" name="phone" value="{{ $customer->phone }}"
                                                            class="form-control" id="phone"
                                                            placeholder="Enter customer Number">
                                                    </div>
                                                </div> <!-- end col -->
                                            </div> <!-- end row -->

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="useremail" class="form-label">Email Address</label>
                                                        <input type="email" name="email" value="{{ $customer->email }}"
                                                            class="form-control" id="useremail"
                                                            placeholder="Enter customer email">
                                                        {{-- <span class="form-text text-muted"><small>If you want to change
                                                                email please <a href="javascript: void(0);">click</a>
                                                                here.</small></span> --}}
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="userpassword" class="form-label">Password <span
                                                                class="required">*</span></label>
                                                        <input type="password" name="password" class="form-control"
                                                            id="userpassword" placeholder="Enter password">
                                                        {{-- <span class="form-text text-muted"><small>If you want to change
                                                                password please <a href="{{ route('password.request') }}">click</a>
                                                                here.</small></span> --}}
                                                    </div>
                                                </div> <!-- end col -->
                                            </div> <!-- end row -->

                                            <h5 class="mb-3 text-uppercase bg-light p-2"><i
                                                    class="mdi mdi-office-building me-1"></i> Profile Picture</h5>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="profilepicture" class="form-label">Profile
                                                            Picture</label>
                                                        <input class="form-control" type="file" name="image"
                                                            id="profilepicture">
                                                    </div>
                                                </div>
                                            </div> <!-- end row -->
                                            <h5 class="mb-3 text-uppercase bg-light p-2"><i
                                                    class="mdi mdi-office-building me-1"></i> Customer Status</h5>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="mb-2">Customer Status </label>
                                                        <br />
                                                        <div class="form-check mb-2 form-check-success">
                                                            <input class="form-check-input rounded-circle" type="radio"
                                                                id="inlineRadio1" value="1" name="status"
                                                                {{ $customer->status == 1 ? 'checked' : '' }}>
                                                            <label for="inlineRadio1"> Active </label>
                                                        </div>
                                                        <div class="form-check mb-2 form-check-danger">
                                                            <input class="form-check-input rounded-circle" type="radio"
                                                                id="inlineRadio2" value="0" name="status"
                                                                {{ $customer->status != 1 ? 'checked' : '' }}>
                                                            <label for="inlineRadio2"> Deactive </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- end row -->

                                            <div class="text-end">
                                                <button type="submit"
                                                    class="btn btn-success waves-effect waves-light mt-2"><i
                                                        class="mdi mdi-content-save"></i> Update</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- end settings content-->

                                </div> <!-- end tab-content -->
                            </div>
                        </div> <!-- end card-->

                    </div> <!-- end col -->
                </div>
                <!-- end row-->

            </div> <!-- container -->

        </div> <!-- content -->


    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

@endsection
