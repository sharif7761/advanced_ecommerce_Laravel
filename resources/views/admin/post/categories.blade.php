@extends('admin.admin_layouts')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <label>Post Category Table</label>
                <a href="" class="btn btn-sm btn-warning float-right" data-toggle="modal" data-target="#modaldemo3">Add Post Category</a>
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
                <h6 class="card-body-title">Post Category List</h6>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">#</th>
                            <th class="wd-15p">Category name English</th>
                            <th class="wd-15p">Category name Bengali</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($postCategories as $key => $category)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $category->category_name_en }}</td>
                            <td>{{ $category->category_name_bn }}</td>
                            <td>
                                <a href="{{ route('edit.post.category', $category->id) }}" class="btn btn-sm btn-info">Edit</a>
                                <a href="{{ route('delete.post.category', $category->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
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
                            <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Category</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="post" action="{{ route('store.post.category') }}">
                            @csrf
                            <div class="modal-body pd-20">
                                <div class="form-group">
                                    <label for="category_name">Category Name in English</label>
                                    <input type="text" class="form-control" id="category_name_en" name="category_name_en" placeholder="Enter Category Name In English">
                                </div>
                                <div class="form-group">
                                    <label for="category_name">Category Name in Bengali</label>
                                    <input type="text" class="form-control" id="category_name_bn" name="category_name_bn" placeholder="Enter Category Name In Bengali">
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
