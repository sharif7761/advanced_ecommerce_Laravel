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
                <h6 class="card-body-title">Update Category</h6>
                <div class="table-wrapper">
                    <form method="post" action="{{ route('update.subcategory', $subcategory->id) }}">
                        @csrf
                        <div class="modal-body pd-20">
                            <div class="form-group">
                                <label for="subcategory_name">Sub-Category Name</label>
                                <input type="text" class="form-control" id="subcategory_name" name="subcategory_name" placeholder="Enter Sub-Category Name" value="{{ $subcategory->subcategory_name }}">
                            </div>
                            <div class="form-group">
                                <label for="category_id">Category Name</label>
                                <select name="category_id" class="form-control">
                                    @foreach($categories as $category)
                                        <option @if($category->id == $subcategory->category->id) echo selected @endif value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div><!-- modal-body -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info pd-x-20">Update Subcategory</button>
                        </div>
                    </form>
                </div><!-- table-wrapper -->
            </div><!-- card -->
            <!-- ########## END: MAIN PANEL ########## -->

@endsection
