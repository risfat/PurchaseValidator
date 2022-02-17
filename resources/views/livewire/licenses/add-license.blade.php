<div>
    <div class="modal-header">
        <h4 class="modal-title">Add New License</h4>
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
                            <select wire:change="SelectProduct($event.target.value)" class="form-select" id="product"
                                name="product">
                                <option selected="">Select Product</option>
                                @forelse ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>

                                @empty

                                    <option disabled value="">No Product Available</option>
                                @endforelse

                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="payment_method">Product Description</label>
                            <input type="text"
                                value="{{ !empty($selected_product->description) ? $selected_product->description : '' }}"
                                class="form-control" id="product_description" name="product_description"
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
                            <select wire:change="SelectCustomer($event.target.value)" name="customer_id"
                                id="customer_id" class="form-control select2">
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
                            <label class="form-label" for="payment_method">Customer ID</label>
                            <input type="text" class="form-control" id="customer_id" name="customer_id"
                                value="{{ !empty($selected_customer->id) ? $selected_customer->id : '' }}"
                                placeholder="Customer ID" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="payment_method">Customer Email</label>
                            <input type="text" class="form-control" id="customer_email" name="customer_email"
                                value="{{ !empty($selected_customer->email) ? $selected_customer->email : '' }}"
                                placeholder="Customer Email" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="payment_method">Customer Status</label>
                            <input type="text" class="form-control" id="customer_status" name="customer_status"
                                value="{{ !empty($selected_customer->status) ? ($selected_customer->status == 1 ? 'Active' : 'Suspended') : '' }}"
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
                            <select wire:model.lazy="license_type" class="form-select" id="product" name="product">
                                <option selected="">Select License Type</option>
                                <option value="trial">Trial</option>
                                <option value="standard">Standard</option>
                                <option value="extended">Extended</option>
                                <option value="epic">Epic</option>

                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="license">Product License</label>
                            <input type="text" value="{{ !empty($license) ? $license : '' }}" class="form-control"
                                id="product_license" name="product_license" placeholder="Product License" readonly>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="license_domain">License Domain</label>
                            <input wire:model.lazy="license_domain" type="text" class="form-control"
                                id="license_domain" name="license_domain" placeholder="License Domain" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="coupon-end-date" class="form-label">Expiry Date <span
                                    class="text-danger">*</span></label>
                            <input wire:model.lazy="license_expiry_date" type="datetime-local" id="basic-datepicker-end"
                                class="form-control" placeholder="Choose End Date" name="end_date" form="coupon-form"
                                required>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="coupon-end-date" class="form-label">License Status <span
                                    class="text-danger">*</span></label>
                            <div class="form-check mb-2 form-check-success">
                                <input wire:model.lazy="status" class="form-check-input" type="radio" name="status"
                                    value="1" id="customradio1">
                                <label class="form-check-label" for="customradio1">Active</label>
                            </div>

                            <div class="form-check mb-2 form-check-danger">
                                <input wire:model.lazy="status" class="form-check-input" type="radio" name="status"
                                    value="0" id="customradio">
                                <label class="form-check-label" for="customradio">Suspended</label>
                            </div>
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


                            <button wire:click="GenerateLicense"
                                class="btn btn-primary waves-effect waves-light">Genarate License</button>

                        </div>
                    </div>
                </div>

            </div>
        </div>


        {{-- <div class="card">
            <h5 class="card-header">License Actions</h5>
            <div class="card-body">

                <div class="row">

                    <div class="col-md-6">
                        <h5 class="mb-3">Status</h5>
                        <div class="row">


                            <div class="form-check mb-2 form-check-success">
                                <input wire:model.lazy="status" class="form-check-input" type="radio" name="status" value="1" id="customradio1">
                                <label class="form-check-label" for="customradio1">Active</label>
                            </div>

                            <div class="form-check mb-2 form-check-danger">
                                <input wire:model.lazy="status" class="form-check-input" type="radio" name="status" value="0" id="customradio">
                                <label class="form-check-label" for="customradio">Suspended</label>
                            </div>

                        </div>


                    </div>

                </div>
            </div>
        </div> --}}


    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
        <button wire:click="CreateLicense" class="btn btn-info waves-effect waves-light">Add
            License</button>
    </div>
</div>
