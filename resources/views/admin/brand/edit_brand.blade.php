@extends('admin.admin_layouts')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <label>Update Brand</label>
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
                <h6 class="card-body-title">Update Brand</h6>
                <div class="table-wrapper">
                    <form method="post" action="{{ route('update.brand', $brand->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body pd-20">
                            <div class="form-group">
                                <label for="brand_name">Brand Name</label>
                                <input type="text" class="form-control" id="brand_name" name="brand_name" placeholder="Enter Brand Name" value="{{ $brand->brand_name }}">
                            </div>
                            <div class="form-group">
                                <label for="brand_logo">Brand logo</label>
                                <input type="file" class="form-control" id="brand_logo" name="brand_logo" >
                            </div>
                            <div class="form-group">
                                <label for="current_brand_logo">Current Brand logo </label>
                                <img src="{{ URL::to($brand->brand_logo) }}" height="40" width="40">
                            </div>
                        </div><!-- modal-body -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info pd-x-20">Update Brand</button>
                        </div>
                    </form>
                </div><!-- table-wrapper -->
            </div><!-- card -->
            <!-- ########## END: MAIN PANEL ########## -->

@endsection
