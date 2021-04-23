@extends('admin.admin_layouts')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <label>Update Category</label>
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
                <h6 class="card-body-title">Update Coupon</h6>
                <div class="table-wrapper">
                    <form method="post" action="{{ route('update.coupon', $coupon->id) }}">
                        @csrf
                        <div class="modal-body pd-20">
                            <div class="form-group">
                                <label for="coupon">Coupon Code</label>
                                <input type="text" class="form-control" id="coupon" name="coupon" placeholder="Enter Coupon Code" value="{{ $coupon->coupon }}">
                            </div>
                            <div class="form-group">
                                <label for="discount">Coupon Discount (%)</label>
                                <input type="number" min="0" max="100" class="form-control" id="discount" name="discount" placeholder="Enter Coupon Discount" value="{{ $coupon->discount }}">
                            </div>
                        </div><!-- modal-body -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info pd-x-20">Update Coupon</button>
                        </div>
                    </form>
                </div><!-- table-wrapper -->
            </div><!-- card -->
            <!-- ########## END: MAIN PANEL ########## -->

@endsection
