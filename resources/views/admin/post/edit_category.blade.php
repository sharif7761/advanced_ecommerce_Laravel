@extends('admin.admin_layouts')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <label>Update Post Category</label>
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
                <h6 class="card-body-title">Update Post Category</h6>
                <div class="table-wrapper">
                    <form method="post" action="{{ route('update.post.category', $post_category->id) }}">
                        @csrf
                        <div class="modal-body pd-20">
                            <div class="form-group">
                                <label for="category_name">Category Name in English</label>
                                <input type="text" class="form-control" id="category_name_en" name="category_name_en" placeholder="Enter Category Name in English" value="{{ $post_category->category_name_en }}">
                            </div>
                            <div class="form-group">
                                <label for="category_name">Category Name in Bengali</label>
                                <input type="text" class="form-control" id="category_name_bn" name="category_name_bn" placeholder="Enter Category Name in bengali" value="{{ $post_category->category_name_bn }}">
                            </div>
                        </div><!-- modal-body -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info pd-x-20">Update Category</button>
                        </div>
                    </form>
                </div><!-- table-wrapper -->
            </div><!-- card -->
            <!-- ########## END: MAIN PANEL ########## -->

@endsection
