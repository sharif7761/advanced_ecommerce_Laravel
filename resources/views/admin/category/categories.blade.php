@extends('admin.admin_layouts')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <label>Category Table</label>
                <a href="" class="btn btn-sm btn-warning float-right">Add Category</a>
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
@endsection
