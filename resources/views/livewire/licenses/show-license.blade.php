<div>

    @if (!empty($license))

        <div class="modal-header">
            <h4 class="modal-title">License Information</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4">

            <div class="card">
                <h5 class="card-header">Product Details</h5>
                <div class="card-body">


                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="product">Product</label>
                                <input type="text" class="form-control" value="{{ $product->name }} || PID: {{ $product->id }}"
                                    id="product_name" name="product_name" placeholder="Product Name" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="payment_method">Product Description</label>
                                <input type="text" value="{{ $product->description }}" class="form-control"
                                    id="product_description" name="product_description"
                                    placeholder="Product Description" disabled>
                            </div>
                        </div>

                    </div>

                </div>
            </div>


            <div class="card">
                <h5 class="card-header">Customer Details</h5>
                <div class="card-body">


                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="customer_id">Customer
                                    Information</label>
                                <input type="text" class="form-control" value="{{ $customer->name }}"
                                    id="customer_name" name="customer_name" placeholder="Customer Name" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="payment_method">Customer ID</label>
                                <input type="text" class="form-control" id="customer_id" name="customer_id"
                                    value="{{ $customer->id }}" placeholder="Customer ID" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="payment_method">Customer Email</label>
                                <input type="text" class="form-control" id="customer_email" name="customer_email"
                                    value="{{ $customer->email }}" placeholder="Customer Email" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="payment_method">Customer Status</label>
                                <input type="text" class="form-control" id="customer_status" name="customer_status"
                                    value="{{ $customer->status == 1 ? 'Active' : 'Suspended' }}"
                                    placeholder="Customer Status" disabled>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <div class="card">
                <h5 class="card-header">License Details</h5>
                <div class="card-body">


                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="product">License Type</label>
                                <input type="text" class="form-control" value="{{ strtoUpper($license->type) }}"
                                    id="license_type" name="license_type" placeholder="License Type" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="license">Product License</label>
                                <input type="text" value="{{ $license->license_key }}" class="form-control"
                                    id="product_license" name="product_license" placeholder="Product License" readonly>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="license_domain">License Domain</label>
                                <input type="text" class="form-control" value="{{ $license->domain }}"
                                    id="license_domain" name="license_domain" placeholder="License Domain" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="coupon-end-date" class="form-label">Expiry Date <span
                                        class="text-danger">*</span></label>
                                <input type="text" id="basic-datepicker-end" class="form-control"
                                    placeholder="Choose End Date" name="end_date" value="{{ $license->expired_at }}"
                                    readonly>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="coupon-end-date" class="form-label">License Status <span
                                        class="text-danger">*</span></label> <br>
                                @if ($license->status == 1)
                                <button type="button" class="btn btn-success btn-xs waves-effect waves-light">Active</button>
                                @else
                                <button type="button" class="btn btn-danger btn-xs waves-effect waves-light">Suspended</button>
                                @endif

                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3 mt-3 text-center">

                                @if (Session::has('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif

                                @if (Session::has('error'))
                                    <div class="alert alert-danger">
                                        {{ Session::get('error') }}
                                    </div>
                                @endif


                                <button onclick="copyText()" wire:click="copyText" class="btn btn-primary waves-effect waves-light">Copy License</button>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="modal-footer">
            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
            {{-- <button wire:click="CreateLicense" class="btn btn-info waves-effect waves-light">Add
            License</button> --}}
        </div>

    @endif



    <script>
        document.addEventListener('livewire:load', function() {
            $(document).on('click', '#license-details', function(event) {
                event.preventDefault();
                let data = $(this).attr('data-attr');
                window.livewire.emit('set:GetLicense', data);
            });
        });

        function copyText() {
            /* Get the text field */
            var copyText = document.getElementById("product_license");

            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */

            /* Copy the text inside the text field */
            navigator.clipboard.writeText(copyText.value);

        }
    </script>


</div>
