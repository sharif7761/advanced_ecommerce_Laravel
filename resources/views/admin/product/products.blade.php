@extends('admin.admin_layouts')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <label>Product Table</label>
                <a href="{{ route('add.product') }}" class="btn btn-sm btn-warning float-right">Add Product</a>
            </div><!-- sl-page-title -->

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Product List</h6>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">Product  Code</th>
                            <th class="wd-15p">Product Name</th>
                            <th class="wd-15p">Image</th>
                            <th class="wd-15p">Category</th>
                            <th class="wd-15p">Brand</th>
                            <th class="wd-15p">Quantity</th>
                            <th class="wd-15p">Status</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $key => $product)
                        <tr>
                            <td>{{ $product->product_code }}</td>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->category->category_name }}</td>
                            <td>{{ $product->brand->brand_name }}</td>
                            <td>{{ $product->product_quantity }}</td>
                            <td>{{ $product->status ? 'active' : 'inactive' }}</td>
                            <td>
                                <a href="{{ route('edit.category', $product->id) }}" class="btn btn-sm btn-info">Edit</a>
                                <a href="{{ route('delete.product', $product->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                                <a href="{{ route('delete.product', $product->id) }}" class="btn btn-sm btn-danger" id="delete">Show</a>
                                @if($product->status === 1)
                                    <a href="{{ route('inactive.product', $product->id) }}" class="btn btn-sm btn-danger" id="inactive">Inactive</a>
                                @else
                                    <a href="{{ route('active.product', $product->id) }}" class="btn btn-sm btn-info">Active</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->
    <!-- ########## END: MAIN PANEL ########## -->
            <script>
                $(document).on("click", "#inactive", function(e){
                    e.preventDefault();
                    var link = $(this).attr("href");
                    swal({
                        title: "Are you Want to inactive product?",
                        text: "Are you sure to inactive the product",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                        .then((willInactive) => {
                            if (willInactive) {
                                window.location.href = link;
                            } else {
                                swal("Safe Data!");
                            }
                        });
                });
            </script>
@endsection
