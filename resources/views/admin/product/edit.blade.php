@extends('admin.admin_layouts')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <label>Update Product</label>
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
                <h6 class="card-body-title">Update Product</h6>
                <div class="table-wrapper">
                    <form method="post" action="{{ route('update.product', $product->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card pd-20 pd-sm-40">
                            <div class="form-layout">
                                <div class="row mg-b-25">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                                            <input class="form-control" type="text" name="product_name" value="{{ $product->product_name }}" placeholder="Enter Product Name">
                                        </div>
                                    </div><!-- col-4 -->
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                                            <input class="form-control" type="text" name="product_code"  value="{{ $product->product_code }}"placeholder="Enter Product Code">
                                        </div>
                                    </div><!-- col-4 -->
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                                            <input class="form-control" type="number" name="product_quantity" value="{{ $product->product_quantity }}" placeholder="Enter Quantity">
                                        </div>
                                    </div><!-- col-4 -->
                                    <div class="col-lg-4">
                                        <div class="form-group mg-b-10-force">
                                            <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                                            <select name="category_id" class="form-control select2" data-placeholder="Choose Category">
                                                @foreach($categories as $category)
                                                    <option @if($category->id === $product->category_id) echo selected @endif value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div><!-- col-4 -->
                                    <div class="col-lg-4">
                                        <div class="form-group mg-b-10-force">
                                            <label class="form-control-label">Sub-Category:</label>
                                            <select name="subcategory_id" class="form-control select2" data-placeholder="Choose Sub-Category">
                                                @foreach($subcategories as $subcategory)
                                                    @if($subcategory->id === $product->subcategory_id)
                                                    <option selected  value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div><!-- col-4 -->
                                    <div class="col-lg-4">
                                        <div class="form-group mg-b-10-force">
                                            <label class="form-control-label">Brand: </label>
                                            <select name="brand_id" class="form-control select2" data-placeholder="Choose Brand">
                                                @foreach($brands as $brand)
                                                    <option @if($brand->id === $product->brand_id) echo selected @endif value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div><!-- col-4 -->
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label">Size: <span class="tx-danger">*</span></label>
                                            <input id="input" type="text" name="size" id="size" data-role="tagsinput" value="{{ $product->size }}" class="form-control" />
                                        </div>
                                    </div><!-- col-4 -->
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label">Color: <span class="tx-danger">*</span></label>
                                            <input id="input" type="text" name="color" id="color" data-role="tagsinput" value="{{ $product->color }}" class="form-control" placeholder="Choose colors" />
                                        </div>
                                    </div><!-- col-4 -->
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label">Selling Price: <span class="tx-danger">*</span></label>
                                            <input class="form-control" type="text" name="selling_price" value="{{ $product->selling_price }}" placeholder="Enter Selling Price">
                                        </div>
                                    </div><!-- col-4 -->
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label">Discount Price: </label>
                                            <input class="form-control" type="text" name="discount_price" value="{{ $product->discount_price }}" placeholder="Enter Discount Price">
                                        </div>
                                    </div><!-- col-4 -->

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Product Details: <span class="tx-danger">*</span></label>
                                            <textarea class="form-control" id="summernote" name="details">
                                                {!!  $product->details !!}
                                            </textarea>
                                        </div>
                                    </div><!-- col-12 -->
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Video Link:</label>
                                            <input class="form-control" type="text" name="video_link" value="{{ $product->video_link }}" placeholder="Enter Video Link">
                                        </div>
                                    </div><!-- col-12 -->
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label">Image One | Main thumbnail:</label>
                                            <label class="custom-file">
                                                <input type="file" id="file" name="image_one" class="custom-file-input" onchange="readURL1(this)">
                                                <span class="custom-file-control"></span>
                                                <br><br>
                                                <img src="{{asset($product->image_one)}}" id="one" height="50" width="50" />
                                            </label>
                                        </div>
                                    </div><!-- col-4 -->
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label">Image Two :</label><br>
                                            <label class="custom-file">
                                                <input type="file" id="file" name="image_two" class="custom-file-input" onchange="readURL2(this)">
                                                <span class="custom-file-control"></span>
                                                <br><br>
                                                <img src="{{asset($product->image_two)}}" id="two" height="50" width="50" />
                                            </label>
                                        </div>
                                    </div><!-- col-4 -->
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label">Image Three:</label><br>
                                            <label class="custom-file">
                                                <input type="file" id="file" name="image_three" class="custom-file-input"  onchange="readURL3(this)">
                                                <span class="custom-file-control"></span>
                                                <br><br>
                                                <img src="{{asset($product->image_three)}}" id="three" height="50" width="50" />
                                            </label>
                                        </div>
                                    </div><!-- col-4 -->
                                </div><!-- row -->
                                <hr>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label class="ckbox">
                                            <input type="checkbox" name="main_slider" value="1" {{ $product->main_slider ? 'checked' : '' }}>
                                            <span>Main Slider</span>
                                        </label>
                                    </div> <!-- col-4 -->
                                    <div class="col-lg-4">
                                        <label class="ckbox">
                                            <input type="checkbox" name="hot_deal" value="1" {{ $product->hot_deal ? 'checked' : '' }}>
                                            <span>Hot Deal</span>
                                        </label>
                                    </div> <!-- col-4 -->
                                    <div class="col-lg-4">
                                        <label class="ckbox">
                                            <input type="checkbox" name="best_rated" value="1" {{ $product->best_rated ? 'checked' : '' }}>
                                            <span>Best Rated</span>
                                        </label>
                                    </div> <!-- col-4 -->
                                    <div class="col-lg-4">
                                        <label class="ckbox">
                                            <input type="checkbox" name="trend" value="1" {{ $product->trend ? 'checked' : '' }}>
                                            <span>Trends</span>
                                        </label>
                                    </div> <!-- col-4 -->
                                    <div class="col-lg-4">
                                        <label class="ckbox">
                                            <input type="checkbox" name="mid_slider" value="1" {{ $product->mid_slider ? 'checked' : '' }}>
                                            <span>Mid Slider</span>
                                        </label>
                                    </div> <!-- col-4 -->
                                    <div class="col-lg-4">
                                        <label class="ckbox">
                                            <input type="checkbox" name="hot_new" value="1" {{ $product->hot_new ? 'checked' : '' }}>
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
                <div class="sl-pagebody">
                    <div class="sl-page-title">
                        <label>Update Product Image</label>
                    </div><!-- sl-page-title -->
                    <div class="">
                <div class="table-wrapper">
                    <div class="row">

                    </div>
                </div>
            </div>
                </div>
            <!-- ########## END: MAIN PANEL ########## -->


            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

            <script type="text/javascript">
                $(document).ready(function(){
                    $('select[name="category_id"]').on('change',function(){
                        var category_id = $(this).val();
                        if (category_id) {
                            $.ajax({
                                url: "{{ url('/get/subcategory/') }}/"+category_id,
                                type:"GET",
                                dataType:"json",
                                success:function(data) {
                                    var d =$('select[name="subcategory_id"]').empty();
                                    $.each(data, function(key, value){

                                        $('select[name="subcategory_id"]').append('<option value="'+ value.id + '">' + value.subcategory_name + '</option>');

                                    });
                                },
                            });

                        }else{
                            alert('danger');
                        }

                    });
                });

            </script>

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
            <script type="text/javascript">
                function readURL2(input){
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('#two')
                                .attr('src', e.target.result)
                                .width(80)
                                .height(80);
                        };
                        reader.readAsDataURL(input.files[0]);
                    }
                }
            </script>
            <script type="text/javascript">
                function readURL3(input){
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('#three')
                                .attr('src', e.target.result)
                                .width(80)
                                .height(80);
                        };
                        reader.readAsDataURL(input.files[0]);
                    }
                }
            </script>
@endsection
