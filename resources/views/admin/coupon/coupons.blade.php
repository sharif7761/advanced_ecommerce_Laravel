@extends('admin.admin_layouts')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <label>Coupon Table</label>
                <a href="" class="btn btn-sm btn-warning float-right" data-toggle="modal" data-target="#modaldemo3">Add Coupon</a>
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
                <h6 class="card-body-title">Coupon List</h6>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">#</th>
                            <th class="wd-15p">Coupon Code</th>
                            <th class="wd-15p">Coupon Discount (%)</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($coupons as $key => $coupon)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $coupon->coupon }}</td>
                            <td>{{ $coupon->discount }}</td>
                            <td>
                                <a href="{{ route('edit.brand', $coupon->id) }}" class="btn btn-sm btn-info">Edit</a>
                                <a href="{{ route('delete.brand', $coupon->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->
    <!-- ########## END: MAIN PANEL ########## -->


            <!-- LARGE MODAL -->
            <div id="modaldemo3" class="modal fade">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content tx-size-sm">
                        <div class="modal-header pd-x-20">
                            <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Coupon</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="post" action="{{ route('store.coupon') }}">
                            @csrf
                            <div class="modal-body pd-20">
                                <div class="form-group">
                                    <label for="coupon">Coupon Code</label>
                                    <input type="text" class="form-control" id="coupon" name="coupon" placeholder="Enter Coupon Code">
                                </div>
                                <div class="form-group">
                                    <label for="discount">Coupon Discount (%)</label>
                                    <input type="number" min="0" max="100" class="form-control" id="discount" name="discount" placeholder="Enter Coupon Discount">
                                </div>
                            </div><!-- modal-body  -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-info pd-x-20">Save Coupon</button>
                                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div><!-- modal-dialog -->
            </div><!-- modal -->
@endsection
