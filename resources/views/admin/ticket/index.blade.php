@extends("layouts.admin_app")
@section('title', 'Tickets - ' . $site_name . ' | Admin Dashboard')


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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tickets</a></li>
                                    <li class="breadcrumb-item active">Ticket List</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Ticket List</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-md-6 col-xl-3">
                        <div class="widget-rounded-circle card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="avatar-lg rounded-circle bg-primary">
                                            <i class="fe-tag font-22 avatar-title text-white"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-end">
                                            <h3 class="text-dark mt-1"><span
                                                    data-plugin="counterup">{{ $total_tickets }}</span></h3>
                                            <p class="text-muted mb-1 text-truncate">Total Tickets</p>
                                        </div>
                                    </div>
                                </div> <!-- end row-->
                            </div>
                        </div> <!-- end widget-rounded-circle-->
                    </div> <!-- end col-->

                    <div class="col-md-6 col-xl-3">
                        <div class="widget-rounded-circle card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="avatar-lg rounded-circle bg-warning">
                                            <i class="fe-clock font-22 avatar-title text-white"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-end">
                                            <h3 class="text-dark mt-1"><span
                                                    data-plugin="counterup">{{ $open_tickets }}</span></h3>
                                            <p class="text-muted mb-1 text-truncate">Open Tickets</p>
                                        </div>
                                    </div>
                                </div> <!-- end row-->
                            </div>
                        </div> <!-- end widget-rounded-circle-->
                    </div> <!-- end col-->

                    <div class="col-md-6 col-xl-3">
                        <div class="widget-rounded-circle card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="avatar-lg rounded-circle bg-success">
                                            <i class="fe-check-circle font-22 avatar-title text-white"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-end">
                                            <h3 class="text-dark mt-1"><span
                                                    data-plugin="counterup">{{ $closed_tickets }}</span></h3>
                                            <p class="text-muted mb-1 text-truncate">Closed Tickets</p>
                                        </div>
                                    </div>
                                </div> <!-- end row-->
                            </div>
                        </div> <!-- end widget-rounded-circle-->
                    </div> <!-- end col-->

                    <div class="col-md-6 col-xl-3">
                        <div class="widget-rounded-circle card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="avatar-lg rounded-circle bg-danger">
                                            <i class="fe-user font-22 avatar-title text-white"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-end">
                                            <h3 class="text-dark mt-1"><span
                                                    data-plugin="counterup">{{ $total_assignees }}</span></h3>
                                            <p class="text-muted mb-1 text-truncate">Total Assignee</p>
                                        </div>
                                    </div>
                                </div> <!-- end row-->
                            </div>
                        </div> <!-- end widget-rounded-circle-->
                    </div> <!-- end col-->
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-12">
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
                                <button type="button" class="btn btn-sm btn-blue waves-effect waves-light float-end">
                                    <i class="mdi mdi-plus-circle"></i> Add Ticket
                                </button>
                                <h4 class="header-title mb-4">Manage Tickets</h4>

                                <div class="table-responsive">
                                    <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100"
                                        id="tickets-table">
                                        <thead>
                                            <tr>
                                                <th>
                                                    ID
                                                </th>
                                                <th>Requested By</th>
                                                <th>Subject</th>
                                                <th>Assignee</th>
                                                <th>Priority</th>
                                                <th>Status</th>
                                                <th>Created Date</th>
                                                <th>Updated Date</th>
                                                <th class="hidden-sm">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @forelse ($tickets as $ticket)
                                                <tr>
                                                    <td><a
                                                            href="{{ route('ticket.edit', $ticket->id) }}"><b>#{{ $ticket->id }}</b></a>
                                                    </td>
                                                    <td>
                                                        <a href="{{ !empty($ticket->user_id) ? route('user.details', $ticket->user_id) : 'javascript: void(0);' }}"
                                                            class="text-body">
                                                            <img src="{{ !empty($ticket->user->image)? url('uploads/images/profiles/' . $ticket->user->image): url('uploads/images/profiles/default.webp') }}"
                                                                alt="contact-img" title="contact-img"
                                                                class="rounded-circle avatar-xs" />
                                                            <span class="ms-2">{{ $ticket->user_name }}</span>
                                                        </a>
                                                    </td>

                                                    <td>
                                                        {{ $ticket->subject }}
                                                    </td>

                                                    <td>
                                                        <a href="javascript: void(0);">
                                                            <img src="{{ !empty($ticket->assignee->image)? url('uploads/images/profiles/' . $ticket->assignee->image): url('uploads/images/profiles/default-admin.png') }}"
                                                                alt="contact-img" title="contact-img"
                                                                class="rounded-circle avatar-xs" />
                                                        </a>
                                                    </td>

                                                    <td>
                                                        @if ($ticket->priority == 'low')
                                                            <span class="badge bg-soft-warning text-warning">Low</span>
                                                        @elseif ($ticket->priority == 'normal')
                                                            <span
                                                                class="badge bg-soft-secondary text-secondary">Normal</span>
                                                        @elseif ($ticket->priority == 'high')
                                                            <span class="badge bg-soft-danger text-danger">High</span>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        @if ($ticket->status == 'open')
                                                            <span class="badge bg-success">Open</span>
                                                        @else
                                                            <span class="badge bg-danger">Closed</span>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        {{ date('F j, Y', strtotime($ticket->created_at)) }} <small
                                                            class="text-muted">{{ date('g:i a', strtotime($ticket->created_at)) }}</small>
                                                    </td>
                                                    <td>
                                                        {{ date('F j, Y', strtotime($ticket->updated_at)) }} <small
                                                            class="text-muted">{{ date('g:i a', strtotime($ticket->updated_at)) }}</small>
                                                    </td>

                                                    <td>
                                                        <div class="btn-group dropdown">
                                                            <a href="javascript: void(0);"
                                                                class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm"
                                                                data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                    class="mdi mdi-dots-horizontal"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('ticket.edit', $ticket->id) }}"><i
                                                                        class="mdi mdi-pencil me-2 text-muted font-18 vertical-middle"></i>Edit
                                                                    Ticket</a>

                                                                @if ($ticket->status == 'open')
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('ticket.close', $ticket->id) }}"><i
                                                                            class="mdi mdi-check-all me-2 text-muted font-18 vertical-middle"></i>Close</a>
                                                                @endif

                                                                <a class="dropdown-item"
                                                                    href="{{ route('ticket.delete', $ticket->id) }}"><i
                                                                        class="mdi mdi-delete me-2 text-muted font-18 vertical-middle"></i>Remove</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>


                                            @empty

                                                <tr>
                                                    <td colspan="8" class="text-center">
                                                        <h4 class="text-muted">No Tickets Found</h4>
                                                    </td>
                                                </tr>

                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- container -->

        </div> <!-- content -->
    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->





@endsection


@push('scripts')

    <!-- third party js -->
    <script src="{{ asset('admin/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('admin/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('admin/libs/jquery-datatables-checkboxes/js/dataTables.checkboxes.min.js') }}"></script>
    <!-- third party js ends -->

    <!-- Tickets init -->
    <script src="{{ asset('admin/js/pages/tickets.js') }}"></script>

@endpush
