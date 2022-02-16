@extends("layouts.admin_app")
@section('title', $site_name . ' - ' . 'Admin Dashboard | Developed By DevTech365.Com')

@push('styles')

    <!-- plugin css -->
    <link href="{{ asset('admin/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet"
        type="text/css" />

@endpush

@section('content')


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
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Dashboard</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->




            </div> <!-- container -->

        </div> <!-- content -->



    </div>



    <!-- Third Party js-->
    <script src="{{ asset('admin/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Plugins js-->
    <script src="{{ asset('admin/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('admin/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js') }}">
    </script>



@endsection

@push('scripts')

    <!-- Third Party js-->
    <script src="{{ asset('admin/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Plugins js-->
    <script src="{{ asset('admin/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('admin/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js') }}">
    </script>
    <script src="{{ asset('admin/libs/peity/jquery.peity.min.js') }}"></script>




@endpush
