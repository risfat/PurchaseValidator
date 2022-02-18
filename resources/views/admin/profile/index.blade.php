@extends('layouts.admin_app')
@section('title', $user->name . '\'s Profile - ' . $site_name . ' | Admin Dashboard')
@section('content')





    @php

    $name = trim($user->name);
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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Contacts</a></li>
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
                                <img src="{{ url('uploads/images/profiles/' . $user->image) }}"
                                    class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">

                                <h4 class="mb-0">{{ $last_name }}</h4>
                                <p class="text-muted"> {{ '@' . Auth::user()->roles->first()->display_name }} </p>

                                {{-- <button type="button"
                                    class="btn btn-success btn-xs waves-effect mb-2 waves-light">Follow</button>
                                <button type="button"
                                    class="btn btn-danger btn-xs waves-effect mb-2 waves-light">Message</button> --}}
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="btn btn-danger btn-xs waves-effect mb-2 waves-light">Logout</button>
                                </form>
                                <div class="text-start mt-3">
                                    <h4 class="font-13 text-uppercase">Details :</h4>
                                    {{-- <p class="text-muted font-13 mb-3">
                                        Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since the
                                        1500s, when an unknown printer took a galley of type.
                                    </p> --}}
                                    <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span
                                            class="ms-2">{{ $user->name }}</span></p>

                                    <p class="text-muted mb-2 font-13"><strong>Mobile :</strong><span
                                            class="ms-2">{{ $user->phone }}</span></p>

                                    <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span
                                            class="ms-2">{{ $user->email }}</span></p>

                                    <p class="text-muted mb-1 font-13"><strong>Position :</strong> <span
                                            class="ms-2"> {{ Auth::user()->roles->first()->display_name }}
                                        </span></p>
                                </div>

                                <ul class="social-list list-inline mt-3 mb-0">
                                    <li class="list-inline-item">
                                        <a href="{{ $user->fb_id }}" target="_blank"
                                            class="social-list-item border-primary text-primary"><i
                                                class="mdi mdi-facebook"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="{{ $user->google_id }}" target="_blank"
                                            class="social-list-item border-danger text-danger"><i
                                                class="mdi mdi-google"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="{{ $user->twitter_id }}" target="_blank"
                                            class="social-list-item border-info text-info"><i
                                                class="mdi mdi-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="{{ $user->linkedin_id }}" target="_blank"
                                            class="social-list-item border-secondary text-secondary"><i
                                                class="mdi mdi-linkedin"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="{{ $user->insta_id }}" target="_blank"
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
                                        <a href="#settings" data-bs-toggle="tab" aria-expanded="true"
                                            class="nav-link active">
                                            Profile Settings
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane show active" id="settings">
                                        <form action="{{ route('admin.profile.update') }}" method="POST"
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
                                                        <input type="text" name="phone" value="{{ $user->phone }}"
                                                            class="form-control" id="phone"
                                                            placeholder="Enter your Number">
                                                    </div>
                                                </div> <!-- end col -->
                                            </div> <!-- end row -->

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="useremail" class="form-label">Email Address</label>
                                                        <input type="email" name="email" value="{{ $user->email }}"
                                                            class="form-control" id="useremail" placeholder="Enter email">
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
