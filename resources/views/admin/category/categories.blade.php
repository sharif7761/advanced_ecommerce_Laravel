@extends('admin.admin_layouts')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <label>Category Table</label>
                <a href="" class="btn btn-sm btn-warning float-right" data-toggle="modal" data-target="#modaldemo3">Add Category</a>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Category List</h6>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">ID</th>
                            <th class="wd-15p">Category name</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Tiger</td>
                            <td>Nixon</td>
                            <td>
                                <a href="" class="btn btn-sm btn-info">Edit</a>
                                <a href="" class="btn btn-sm btn-danger" id="delete">Delete</a>
                            </td>
                        </tr>
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
                            <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Category</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="post" action="{{ route('store.category') }}">
                            @csrf
                            <div class="modal-body pd-20">
                                <div class="form-group">
                                    <label for="category_name">Category Name</label>
                                    <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter Category Name">
                                </div>
                            </div><!-- modal-body -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-info pd-x-20">Save Category</button>
                                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div><!-- modal-dialog -->
            </div><!-- modal -->
@endsection
