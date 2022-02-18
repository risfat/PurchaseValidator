@extends("layouts.admin_app")
@section('title', 'Tickets - ' . $site_name . ' | Admin Dashboard')

@push('styles')
    <link href="{{ asset('admin/css/noty.min.css') }}" rel="stylesheet">
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
                                    <li class="breadcrumb-item active">Ticket Detail</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Ticket Detail</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-8 col-lg-7">
                        <!-- project card -->
                        <div class="card d-block">
                            <div class="card-body">

                                <div class="float-sm-end mb-2 mb-sm-0">
                                    <div class="row g-2">
                                        <div class="col-auto">
                                            <a href="{{ route('ticket.index') }}" class="btn btn-sm btn-link"><i
                                                    class="mdi mdi-keyboard-backspace"></i> Back</a>
                                        </div>
                                        <div class="col-auto">
                                            <select class="form-select form-select-sm form">
                                                <option selected="">Watch</option>
                                                <option value="1">Remind me</option>
                                                <option value="2">Close</option>
                                            </select>
                                        </div>
                                    </div>
                                </div> <!-- end dropdown-->

                                <h4 class="mb-3 mt-0 font-18">{{ $ticket->subject }}</h4>

                                <div class="clerfix"></div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <!-- Ticket type -->
                                        <label class="mt-2 mb-1">Ticket Type :</label>
                                        <p>
                                            <i class='mdi mdi-ticket font-18 text-success me-1 align-middle'></i> Undefined
                                        </p>
                                        <!-- end Ticket Type -->
                                    </div>
                                    <div class="col-md-4">
                                        <!-- Ticket type -->
                                        <label class="mt-2 mb-1">Ticket ID :</label>
                                        <p>
                                            <i
                                                class='mdi mdi-ticket font-18 text-success me-1 align-middle'></i><b>#{{ $ticket->id }}</b>
                                        </p>
                                        <!-- end Ticket Type -->
                                    </div>
                                </div> <!-- end row -->

                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Reported by -->
                                        <label class="mt-2 mb-1">Reported By :</label>
                                        <div class="d-flex align-items-start">
                                            <img src="{{ !empty($ticket->user->image)? url('uploads/images/profiles/' . $ticket->user->image): url('uploads/images/profiles/default.webp') }}"
                                                alt="User Image" class="rounded-circle me-2" height="24" />
                                            <div class="w-100">
                                                <p><a href="{{ !empty($ticket->user_id) ? route('user.details', $ticket->user_id) : 'javascript: void(0);' }}"
                                                        class="text-body"> {{ $ticket->user_name }} </a> </p>
                                            </div>
                                        </div>
                                        <!-- end Reported by -->
                                    </div> <!-- end col -->

                                    <div class="col-md-6">
                                        <!-- assignee -->
                                        <label class="mt-2 mb-1">Assigned To :</label>
                                        <div class="d-flex align-items-start">
                                            <img src="{{ !empty($ticket->assignee->image)? url('uploads/images/profiles/' . $ticket->assignee->image): url('uploads/images/profiles/default-admin.png') }}"
                                                alt="Arya S" class="rounded-circle me-2" height="24" />
                                            <div class="w-100">
                                                <p> {{ !empty($ticket->assignee->name) ? $ticket->assignee->name : 'N/A' }}
                                                </p>
                                            </div>
                                        </div>
                                        <!-- end assignee -->
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- assignee -->
                                        <label class="mt-2 mb-1">Created On :</label>
                                        <p>{{ date('F j, Y', strtotime($ticket->created_at)) }} <small
                                                class="text-muted">{{ date('g:i a', strtotime($ticket->created_at)) }}</small>
                                        </p>
                                        <!-- end assignee -->
                                    </div> <!-- end col -->

                                    <div class="col-md-6">
                                        <!-- assignee -->
                                        <label class="mt-2 mb-1">Updated On :</label>
                                        <p>{{ date('F j, Y', strtotime($ticket->updated_at)) }} <small
                                                class="text-muted">{{ date('g:i a', strtotime($ticket->updated_at)) }}</small>
                                        </p>
                                        <!-- end assignee -->
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Status -->
                                        <label class="mt-2 form-label">Status :</label>
                                        <div class="row">
                                            <div class="col-auto">
                                                <select name="status" id="ticket-status" class="form-select form-select-sm">
                                                    <option value="open"
                                                        {{ $ticket->status == 'open' ? 'selected' : '' }}>Open
                                                    </option>
                                                    <option value="closed"
                                                        {{ $ticket->status == 'closed' ? 'selected' : '' }}>Close
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- end Status -->
                                    </div> <!-- end col -->

                                    <div class="col-md-6">
                                        <!-- Priority -->
                                        <label class="mt-2 mb-1">Priority :</label>
                                        <div class="row">
                                            <div class="col-auto">
                                                <select id="ticket-priority" name="priority"
                                                    class="form-select form-select-sm">
                                                    <option value="low"
                                                        {{ $ticket->priority == 'low' ? 'selected' : '' }}>Low
                                                    </option>
                                                    <option value="normal"
                                                        {{ $ticket->priority == 'normal' ? 'selected' : '' }}>Normal
                                                    </option>
                                                    <option value="high"
                                                        {{ $ticket->priority == 'high' ? 'selected' : '' }}>High
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- end Priority -->
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                <label class="mt-4 mb-1">Overview :</label>

                                <p class="text-muted mb-0">
                                    {{ $ticket->message }}
                                </p>

                            </div> <!-- end card-body-->

                        </div> <!-- end card-->

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
                                <div class="float-end">
                                    <select class="form-select form-select-sm ">
                                        <option selected="">Recent</option>
                                        <option value="1">Old</option>
                                    </select>
                                </div> <!-- end dropdown-->

                                <h4 class="mb-4 mt-0 font-16">Notes</h4>

                                <div class="clerfix"></div>

                                <div class="d-flex align-items-start">

                                    {{ $ticket->notes }}

                                </div>



                                <div class="border rounded mt-4">
                                    <form action="{{ route('ticket.update', $ticket->id) }}" method="POST"
                                        class="comment-area-box">
                                        @csrf
                                        <textarea rows="3" name="notes" class="form-control border-0 resize-none"
                                            placeholder="Notes About This Ticket..."></textarea>
                                        <div class="p-2 bg-light d-flex justify-content-between align-items-center">
                                            <div>
                                                <a href="#" class="btn btn-sm px-1 btn-light"><i
                                                        class='mdi mdi-upload'></i></a>
                                                <a href="#" class="btn btn-sm px-1 btn-light"><i class='mdi mdi-at'></i></a>
                                            </div>
                                            <button type="submit" class="btn btn-sm btn-success"><i
                                                    class="mdi mdi-send me-1"></i>Submit</button>
                                        </div>
                                    </form>
                                </div> <!-- end .border-->

                            </div> <!-- end card-body-->
                        </div>
                        <!-- end card-->
                    </div> <!-- end col -->

                    <div class="col-xl-4 col-lg-5">

                        <div class="card">
                            <div class="card-body">

                                <h5 class="card-title font-16 mb-3">Attachments</h5>

                                <div class="card mb-1 shadow-none border">
                                    <div class="p-2">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                No Attachments Available
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
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

    <script src="{{ asset('admin/js/noty.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            $('#ticket-status').on('change', function() {
                var status = $(this).val();
                $.ajax({
                    url: "{{ route('ticket.update.ajax', $ticket->id) }}",
                    type: "POST",
                    data: {
                        'status': status,
                        '_token': "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        if (data.success) {
                            new Noty({
                                text: data.success,
                                theme: 'metroui',
                                layout: 'topRight',
                                type: 'information',
                                timeout: 3000,
                            }).show();
                        } else {
                            new Noty({
                                text: data.error,
                                theme: 'metroui',
                                layout: 'topRight',
                                type: 'error',
                                timeout: 3000,
                            }).show();
                        }
                    }
                });
            });

            $('#ticket-priority').on('change', function() {
                var priority = $(this).val();
                $.ajax({
                    url: "{{ route('ticket.update.ajax', $ticket->id) }}",
                    type: "POST",
                    data: {
                        'priority': priority,
                        '_token': "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        if (data.success) {
                            new Noty({
                                text: data.success,
                                theme: 'metroui',
                                layout: 'topRight',
                                type: 'information',
                                timeout: 3000,
                            }).show();
                        } else {
                            new Noty({
                                text: data.error,
                                theme: 'metroui',
                                layout: 'topRight',
                                type: 'error',
                                timeout: 3000,
                            }).show();
                        }
                    }
                });
            });

        });
    </script>


@endpush
