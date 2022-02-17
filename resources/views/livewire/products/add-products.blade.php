            <!-- Start Content-->
            <div class="container-fluid">
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data"
                    id="product-form">
                    @csrf
                </form>
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{ $site_name }}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Product</a></li>
                                    <li class="breadcrumb-item active">Add Product</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Add Product</h4>
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
                                <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Product Details</h5>

                                <div class="mb-3">
                                    <label for="product-name" class="form-label">Product Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="product-name" name="name" form="product-form"
                                        class="form-control" placeholder="e.g : Apple iMac"
                                        value="{{ old('name') }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="product-description" class="form-label">Product Description <span
                                            class="text-danger">*</span></label>
                                    <textarea id="product-description" name="description" form="product-form"
                                        class="form-control" placeholder="e.g : This is a very good product"
                                        required>{{ old('description') }}</textarea>
                                </div>




                                <div class="mb-3">
                                    <label for="product-price">Price <span
                                            class="text-danger"></span></label>
                                    <input type="number" class="form-control" id="product-price" name="price"
                                        value="{{ old('price') }}" form="product-form" placeholder="Enter amount">
                                </div>



                                <div class="mb-3">
                                    <label class="mb-2">Product Status <span
                                            class="text-danger">*</span></label>
                                    <br />
                                    <div class="form-check mb-2 form-check-success">
                                        <input class="form-check-input rounded-circle" type="radio" id="inlineRadio1"
                                            value="1" name="status" form="product-form" checked="">
                                        <label for="inlineRadio1"> Active </label>
                                    </div>
                                    <div class="form-check mb-2 form-check-danger">
                                        <input class="form-check-input rounded-circle" type="radio" id="inlineRadio2"
                                            value="0" name="status" form="product-form">
                                        <label for="inlineRadio2"> Deactive </label>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end card -->
                    </div> <!-- end col -->

                    <div class="col-lg-6">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">Product Images</h5>
                                <label for="Category-image" class="form-label">Image <span
                                        class="text-danger">*</span></label>
                                <center>
                                    <input name="product_image" type="file" class="dropify" data-height="200"
                                        form="product-form" required />
                                </center> <!-- Preview -->

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
                            <button type="submit" id="submit-form" form="product-form"
                                class="btn w-sm btn-success waves-effect waves-light">Save</button>
                        </div>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->


            </div> <!-- container -->
