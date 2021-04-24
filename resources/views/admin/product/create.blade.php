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
                    <form method="post" action="#">
                        @csrf
                        <div class="card pd-20 pd-sm-40">
                            <div class="form-layout">
                                <div class="row mg-b-25">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                                            <input class="form-control" type="text" name="product_name" placeholder="Enter Product Name">
                                        </div>
                                    </div><!-- col-4 -->
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                                            <input class="form-control" type="text" name="product_code" placeholder="Enter Product Code">
                                        </div>
                                    </div><!-- col-4 -->
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                                            <input class="form-control" type="text" name="quantity" placeholder="Enter Quantity">
                                        </div>
                                    </div><!-- col-4 -->
                                    <div class="col-lg-4">
                                        <div class="form-group mg-b-10-force">
                                            <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                                            <select name="category_id" class="form-control select2" data-placeholder="Choose Category">
                                                <option label="Choose country"></option>
                                                <option value="USA">United States of America</option>
                                                <option value="UK">United Kingdom</option>
                                                <option value="China">China</option>
                                                <option value="Japan">Japan</option>
                                            </select>
                                        </div>
                                    </div><!-- col-4 -->
                                    <div class="col-lg-4">
                                        <div class="form-group mg-b-10-force">
                                            <label class="form-control-label">Sub-Category:</label>
                                            <select name="subcategory_id" class="form-control select2" data-placeholder="Choose Sub-Category">
                                                <option label="Choose country"></option>
                                                <option value="USA">United States of America</option>
                                                <option value="UK">United Kingdom</option>
                                                <option value="China">China</option>
                                                <option value="Japan">Japan</option>
                                            </select>
                                        </div>
                                    </div><!-- col-4 -->
                                    <div class="col-lg-4">
                                        <div class="form-group mg-b-10-force">
                                            <label class="form-control-label">Brand: </label>
                                            <select name="brand_id" class="form-control select2" data-placeholder="Choose Brand">
                                                <option label="Choose country"></option>
                                                <option value="USA">United States of America</option>
                                                <option value="UK">United Kingdom</option>
                                                <option value="China">China</option>
                                                <option value="Japan">Japan</option>
                                            </select>
                                        </div>
                                    </div><!-- col-4 -->
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label">Size: <span class="tx-danger">*</span></label>
                                            <input id="input" type="text" name="size" id="size" data-role="tagsinput" class="form-control" />
                                        </div>
                                    </div><!-- col-4 -->
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label">Color: <span class="tx-danger">*</span></label>
                                            <input id="input" type="text" name="color" id="color" data-role="tagsinput" class="form-control" placeholder="Choose colors" />
                                        </div>
                                    </div><!-- col-4 -->
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label">Selling Price: <span class="tx-danger">*</span></label>
                                            <input class="form-control" type="text" name="selling_price" placeholder="Enter Selling Price">
                                        </div>
                                    </div><!-- col-4 -->
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Product Details: <span class="tx-danger">*</span></label>
                                            <input class="form-control" id="summernote" name="details">
                                        </div>
                                    </div><!-- col-12 -->
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Video Link:</label>
                                            <input class="form-control" type="text" name="video_link" placeholder="Enter Video Link">
                                        </div>
                                    </div><!-- col-12 -->
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label">Image One | Main thumbnail:</label>
                                            <label class="custom-file">
                                                <input type="file" id="file" name="image_one" class="custom-file-input">
                                                <span class="custom-file-control"></span>
                                            </label>
                                        </div>
                                    </div><!-- col-4 -->
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label">Image Two :</label><br>
                                            <label class="custom-file">
                                                <input type="file" id="file" name="image_two" class="custom-file-input">
                                                <span class="custom-file-control"></span>
                                            </label>
                                        </div>
                                    </div><!-- col-4 -->
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label">Image Three:</label><br>
                                            <label class="custom-file">
                                                <input type="file" id="file" name="image_three" class="custom-file-input">
                                                <span class="custom-file-control"></span>
                                            </label>
                                        </div>
                                    </div><!-- col-4 -->
                                </div><!-- row -->
                                <hr>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label class="ckbox">
                                            <input type="checkbox" name="main_slider" value="1">
                                            <span>Main Slider</span>
                                        </label>
                                    </div> <!-- col-4 -->
                                    <div class="col-lg-4">
                                        <label class="ckbox">
                                            <input type="checkbox" name="hot_deal" value="1">
                                            <span>Hot Deal</span>
                                        </label>
                                    </div> <!-- col-4 -->
                                    <div class="col-lg-4">
                                        <label class="ckbox">
                                            <input type="checkbox" name="best_rated" value="1">
                                            <span>Best Rated</span>
                                        </label>
                                    </div> <!-- col-4 -->
                                    <div class="col-lg-4">
                                        <label class="ckbox">
                                            <input type="checkbox" name="trend" value="1">
                                            <span>Trends</span>
                                        </label>
                                    </div> <!-- col-4 -->
                                    <div class="col-lg-4">
                                        <label class="ckbox">
                                            <input type="checkbox" name="mid_slider" value="1">
                                            <span>Mid Slider</span>
                                        </label>
                                    </div> <!-- col-4 -->
                                    <div class="col-lg-4">
                                        <label class="ckbox">
                                            <input type="checkbox" name="hot_new" value="1">
                                            <span>Hot New</span>
                                        </label>
                                    </div> <!-- col-4 -->
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

@endsection
