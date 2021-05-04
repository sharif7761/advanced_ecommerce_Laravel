@extends('admin.admin_layouts')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <label>Add Product</label>
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
                <h6 class="card-body-title">Add Product</h6>
                <div class="table-wrapper">
                    <form method="post" action="{{ route('store.product') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card pd-20 pd-sm-40">
                            <div class="form-layout">
                                <div class="row mg-b-25">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Post Title (English): <span class="tx-danger">*</span></label>
                                            <input class="form-control" type="text" name="post_title_en" placeholder="Post Title (English)" required>
                                        </div>
                                    </div><!-- col-6 -->
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Post Title (Bengali): <span class="tx-danger">*</span></label>
                                            <input class="form-control" type="text" name="post_title_bn" placeholder="Post Title (Bengali)" required>
                                        </div>
                                    </div><!-- col-6 -->
                                    <div class="col-lg-4">
                                        <div class="form-group mg-b-10-force">
                                            <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                                            <select name="category_id" class="form-control select2" data-placeholder="Choose Category">
                                                <option label="Choose Post Category"></option>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->category_name_en }}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div><!-- col-4 -->
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Post Details(English): <span class="tx-danger">*</span></label>
                                            <textarea class="form-control" id="summernote" name="details_en"></textarea>
                                        </div>
                                    </div><!-- col-12 -->
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Post Details(Bengali): <span class="tx-danger">*</span></label>
                                            <textarea class="form-control" id="summernote2" name="details_bn"></textarea>
                                        </div>
                                    </div><!-- col-12 -->
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label">Post Image:</label>
                                            <label class="custom-file">
                                                <input type="file" id="file" name="image_one" class="custom-file-input" onchange="readURL1(this)">
                                                <span class="custom-file-control"></span>
                                                <br><br>
                                                <img src="#" id="one" />
                                            </label>
                                        </div>
                                    </div><!-- col-4 -->
                                </div><!-- row -->
                                <div class="form-layout-footer">
                                    <button type="submit" class="btn btn-info mg-r-5">Submit Form</button>
                                </div><!-- form-layout-footer -->
                            </div><!-- form-layout -->
                        </div><!-- card -->
                    </form>
                </div><!-- table-wrapper -->
            </div><!-- card -->
            <!-- ########## END: MAIN PANEL ########## -->


            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

            <script type="text/javascript">
                function readURL1(input){
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('#one')
                                .attr('src', e.target.result)
                                .width(80)
                                .height(80);
                        };
                        reader.readAsDataURL(input.files[0]);
                    }
                }
            </script>
@endsection
