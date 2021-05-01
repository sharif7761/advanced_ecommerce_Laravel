@extends('admin.admin_layouts')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <label>View Product</label>
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
                <h6 class="card-body-title">View Product</h6>
                <div class="table-wrapper">
                    <div class="card pd-20 pd-sm-40">
                        <div class="form-layout">
                            <div class="row mg-b-25">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Product Name:</label>
                                        <p><strong>{{ $product->product_name }}</strong></p>
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Product Code: </label>
                                        <p><strong>{{ $product->product_code }}</strong></p>
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Quantity: </label>
                                        <p><strong>{{ $product->product_quantity }}</strong></p>
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group mg-b-10-force">
                                        <label class="form-control-label">Category: </label>
                                        <p><strong>{{ $product->category->category_name }}</strong></p>
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group mg-b-10-force">
                                        <label class="form-control-label">Sub-Category:</label>
                                        <p><strong>{{ $product->subcategory->subcategory_name }}</strong></p>
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group mg-b-10-force">
                                        <label class="form-control-label">Brand: </label>
                                        <p><strong>{{ $product->brand->brand_name }}</strong></p>
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Size: <span class="tx-danger">*</span></label>
                                        <p><strong>{{ $product->size }}</strong></p>
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Color: <span class="tx-danger">*</span></label>
                                        <p><strong>{{ $product->color }}</strong></p>
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Selling Price: <span class="tx-danger">*</span></label>
                                        <p><strong>{{ $product->selling_price }}</strong></p>
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Product Details: <span class="tx-danger">*</span></label>
                                        <p>{!! $product->details !!}</p>
                                    </div>
                                </div><!-- col-12 -->
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Video Link:</label>
                                        <p><strong>{{ $product->video_link }}</strong></p>
                                    </div>
                                </div><!-- col-12 -->
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Image One | Main thumbnail:</label>
                                        <label class="custom-file">
                                            <img src="#" id="one" />
                                        </label>
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Image Two :</label><br>
                                        <label class="custom-file">
                                            <img src="#" id="two" nerror="this.style.display='none'" />
                                        </label>
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Image Three:</label><br>
                                        <label class="custom-file">
                                            <img src="#" id="three" />
                                        </label>
                                    </div>
                                </div><!-- col-4 -->
                            </div><!-- row -->
                            <hr>
                            <div class="row">
                                <div class="col-lg-4">
                                    <span>Main Slider</span>
                                    <span class="badge {{ $product->main_slider ? 'badge-success' : 'badge-danger' }}">{{ $product->main_slider ? 'active' : 'inactive' }}</span>
                                </div> <!-- col-4 -->
                                <div class="col-lg-4">
                                    <span>Hot Deal</span>
                                    <span class="badge {{ $product->hot_deal ? 'badge-success' : 'badge-danger' }}">{{ $product->hot_deal ? 'active' : 'inactive' }}</span>
                                </div> <!-- col-4 -->
                                <div class="col-lg-4">
                                    <span>Best Rated</span>
                                    <span class="badge {{ $product->best_rated ? 'badge-success' : 'badge-danger' }}">{{ $product->best_rated ? 'active' : 'inactive' }}</span>
                                </div> <!-- col-4 -->
                                <div class="col-lg-4">
                                    <span>Trends</span>
                                    <span class="badge {{ $product->trend ? 'badge-success' : 'badge-danger' }}">{{ $product->trend ? 'active' : 'inactive' }}</span>
                                </div> <!-- col-4 -->
                                <div class="col-lg-4">
                                    <span>Mid Slider</span>
                                    <span class="badge {{ $product->mid_slider ? 'badge-success' : 'badge-danger' }}">{{ $product->mid_slider ? 'active' : 'inactive' }}</span>
                                </div> <!-- col-4 -->
                                <div class="col-lg-4">
                                    <span>Hot New</span>
                                    <span class="badge {{ $product->hot_new ? 'badge-success' : 'badge-danger' }}">{{ $product->hot_new ? 'active' : 'inactive' }}</span>
                                </div> <!-- col-4 -->
                            </div><!-- row -->
                        </div><!-- form-layout -->
                    </div><!-- card -->
                </div><!-- table-wrapper -->
            </div><!-- card -->
@endsection
