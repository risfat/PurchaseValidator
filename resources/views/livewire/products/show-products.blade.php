     <div>

         <!-- start page title -->
         <div class="row">
             <div class="col-12">
                 <div class="page-title-box">
                     <div class="page-title-right">
                         <ol class="breadcrumb m-0">
                             <li class="breadcrumb-item"><a href="javascript: void(0);">{{ $site_name }}</a>
                             </li>
                             <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                             <li class="breadcrumb-item active">Products</li>
                         </ol>
                     </div>
                     <h4 class="page-title">Products</h4>
                 </div>
             </div>
         </div>
         <!-- end page title -->

         <div class="row">
             <div class="col-12">
                 <div class="card">
                     <div class="card-body">
                         <div class="row justify-content-between">
                             <div class="col-3">
                                 <form method="GET" class="d-flex flex-wrap align-items-center">
                                     <label for="inputPassword2" class="visually-hidden">Search</label>
                                     <div class="me-3">
                                         <input type="search" name="filter[name]" class="form-control my-1 my-lg-0"
                                             id="inputPassword2" placeholder="Search...">

                                         {{-- <button class="btn input-group-text btn-dark waves-effect waves-light"
                                                    type="button">Search</button> --}}
                                     </div>
                                 </form>
                             </div>
                             <div class="col-2">
                                 <div class="me-sm-3">
                                     <select class="form-select my-1 my-lg-0" id="status-select" name="sort"
                                         onchange="location = this.value;">
                                         <option value="{{ route('products.index') }}">Sort By</option>
                                         <option {{ request()->get('sort') == 'name' ? 'selected' : '' }}
                                             value="{{ route('products.index') }}?sort=name">Product Name
                                         </option>
                                         <option {{ request()->get('sort') == '-price' ? 'selected' : '' }}
                                             value="{{ route('products.index') }}?sort=-price">Product Price
                                         </option>
                                         <option {{ request()->get('sort') == '-sold' ? 'selected' : '' }}
                                             value="{{ route('products.index') }}?sort=-sold">Product Sold
                                         </option>
                                         <option {{ request()->get('sort') == 'status' ? 'selected' : '' }}
                                             value="{{ route('products.index') }}?sort=status">Product Status
                                         </option>
                                     </select>
                                 </div>

                             </div>
                             <div class="col-2">
                                 <div class="me-sm-3">
                                     <select class="form-select my-1 my-lg-0" id="status-select" name="status"
                                         onchange="location = this.value;">
                                         <option>Status</option>
                                         <option {{ request()->get('filter%5Bstatus%5D') == '1' ? 'selected' : '' }}
                                             value="{{ route('products.index') }}?filter%5Bstatus%5D=1">Active
                                         </option>
                                         <option {{ request()->get('filter%5Bstatus%5D') == '0' ? 'selected' : '' }}
                                             value="{{ route('products.index') }}?filter%5Bstatus%5D=0">
                                             Inactive</option>
                                     </select>
                                 </div>
                             </div>
                             <div class="col-5">
                                 <div class="text-lg-end my-1 my-lg-0">
                                     <button type="button" class="btn btn-success waves-effect waves-light me-1"><i
                                             class="mdi mdi-cog"></i></button>
                                     <a href="{{ route('products.create') }}"
                                         class="btn btn-danger waves-effect waves-light"><i
                                             class="mdi mdi-plus-circle me-1"></i> Add New</a>
                                 </div>
                             </div><!-- end col-->
                         </div> <!-- end row -->
                     </div>
                 </div> <!-- end card -->
             </div> <!-- end col-->
         </div>
         <!-- end row-->

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

             @if (session()->has('message'))
                 <div class="alert alert-success">
                     {{ session('message') }}
                 </div>
             @endif

             @forelse ($products as $product)
                 <div class="col-md-6 col-xl-3">
                     <div class="card product-box">
                         <div class="card-body">
                             <div class="product-action">
                                 <a href="{{ route('products.edit', $product->id) }}"
                                     class="btn btn-success btn-xs waves-effect waves-light"><i
                                         class="mdi mdi-pencil"></i></a>
                                 <button class="btn btn-danger btn-xs waves-effect waves-light"
                                     wire:click="remove({{ $product->id }})"><i class="mdi mdi-close"></i></button>
                             </div>

                             <div class="bg-light">
                                 <img src="{{ url('uploads/images/products/' . $product->image) }}" alt="product-pic"
                                     class="img-fluid" />
                             </div>

                             <div class="product-info">
                                 <div class="row align-items-center">
                                     <div class="col">
                                         <h5 class="font-16 mt-0 sp-line-1"><a href="ecommerce-product-detail.html"
                                                 class="text-dark">{{ $product->name }}</a> </h5>
                                         <div class="text-warning mb-2 font-13">

                                         </div>
                                         <h5 class="m-0">
                                             <span class="text-muted"> Status : @if ($product->status == 1)
                                                     Active
                                                 @else
                                                     Inactive
                                                 @endif
                                             </span>
                                         </h5>
                                         <h5 class="m-0"> <span class="text-muted"> Licensed :
                                                 {{ $product->licensed }}
                                                 pcs</span>
                                         </h5>
                                     </div>
                                     <div class="col-auto">
                                         <div class="product-price-tag">
                                             {{ !empty($product->price) ? $product->price : '' }}
                                             <span class="currency">৳</span>
                                         </div>
                                     </div>
                                 </div> <!-- end row -->
                             </div> <!-- end product info-->
                         </div>
                     </div> <!-- end card-->
                 </div> <!-- end col-->

             @empty

                 <div class="row">

                     <div class="col-12">
                         <div class="card">
                             <div class="card-body">
                                 <h4 class="header-title mb-3">No Products Found</h4>
                             </div>
                         </div>
                     </div>

                 </div>
             @endforelse
         </div>
         <!-- end row-->

         <div class="row">
             <div class="col-12">
                 <ul class="pagination pagination-rounded justify-content-end mb-3">

                     {{-- {{ $products->links('pagination::bootstrap-4') }} --}}

                 </ul>
             </div> <!-- end col-->
         </div>
         <!-- end row-->
     </div>
