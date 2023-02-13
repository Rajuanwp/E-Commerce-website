@extends('backend.mastaring.master')

@section('content')

<div class="br-mainpanel">
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
            <h4>Product</h4>
            <p class="mg-b-0">Add Category</p>
        </div>
    </div>


    <div class="br-pagebody">
        <form action="{{ route('UpdateProduct') }} " method="POST" enctype='multipart/form-data'>

            @csrf
            <input type="hidden" name="id" value="{{$products->id}}">
            <input type="hidden" name="old_img" value="{{$products->product_thambnail}}">

            <div class="br-section-wrapper">
                <h6 class="br-section-label">Add New Product</h6>
                <p class="br-section-text">Add Product Infromation.</p>

                <div class="form-layout form-layout-1">
                    <div class="row mg-b-25">
                        <div class="form-group col-lg-3">
                            <div class="d-flex">
                                <div id="slWrapper" class="parsley-select wd-250">
                                    <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                                    <select class="form-control" id="category_id" name="category_id" >
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>

                                </div>

                            </div><!-- d-flex -->
                        </div><!-- col-4 -->

                        <div class="col-lg-3">
                            <div class="d-flex">
                                <div id="slWrapper" class="parsley-select wd-250">
                                    <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                                    <select class="form-control" id="brand_id" name="brand_id" >

                                        @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                    <div id="slErrorContainer"></div>
                                </div>

                            </div><!-- d-flex -->
                        </div><!-- col-4 -->


                        {{-- <div class=" col-lg-3">
                            <div class="d-flex">
                                <div id="slWrapper" class="parsley-select wd-250">
                                    <label class="form-control-label">Vandor Name: <span
                                            class="tx-danger">*</span></label>
                                    <select class="form-control" id="brand_id" name="brand_id" >
                                        <option value="">Select Brand</option>
                                        @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                    <div id="slErrorContainer"></div>
                                </div>

                            </div><!-- d-flex -->
                        </div><!-- col-4 --> --}}


                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="product_name">Product Name:<span class="tx-danger">*</span></label>
                                <input type="text" name="product_name" class="form-control" id="inputProductTitle"
                                    value="{{ $products->product_name }}">
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="product_tags">Product Tag:<span class="tx-danger">*</span></label>
                                <input type="text" name="product_tags" class="form-control visually-hidden"
                                    data-role="tagsinput" value="{{ $products->product_tags }}">
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="product_size">Product Size:<span class="tx-danger">*</span></label>
                                <input type="text" name="product_size" class="form-control visually-hidden"
                                    data-role="tagsinput" value="{{ $products->product_size }} ">
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="product_color">Product Color:<span class="tx-danger">*</span></label>
                                <input type="text" name="product_color" id="product_color" data-role="tagsinput"
                                    placeholder="Product Color" value="{{ $products->product_color }}">
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="product_slug">Product Slug:<span class="tx-danger">*</span></label>
                                <input type="text" class="form-control" id="product_slug" name="product_slug"
                                    value="{{ $products->product_slug }}">
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="price">Price:<span class="tx-danger">*</span></label>
                                <input type="text" class="form-control" id="selling_price" name="selling_price"
                                    value="{{ $products->selling_price }}">
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="discount_price">Discount Price:<span class="tx-danger">*</span></label>
                                <input type="text" class="form-control" id="discount_price" name="discount_price"
                                    value="{{ $products->discount_price }}">
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="discount_price">Product Qty:<span class="tx-danger">*</span></label>
                                <input type="text" class="form-control" id="product_qty" name="product_qty"
                                    value="{{ $products->product_qty }}">
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="product_code">Product Code:<span class="tx-danger">*</span></label>
                                <input type="text" name="product_code" class="mt-1 form-control" id="code"
                                    value="{{ $products->product_code }}">
                                <div class="input-group-append float-right ">
                                    <button id="genbutton" type="button" class=" mt-1 btn btn-sm btn-info">code</button>
                                </div>
                            </div>
                        </div><!-- col-4 -->



                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="product_thambnail">Featured Image:<span class="tx-danger">*</span></label>
                                <input type="file" class="form-control" id="product_thambnail" name="product_thambnail">
                                <img class="mt-2" src="{{ asset($products->product_thambnail) }}"
                                    alt="product image" width="50" height="50">
                            </div>
                        </div>


                        <div class="col-lg-3">
                            <div class="d-flex">
                                <div id="slWrapper" class="parsley-select wd-250">
                                    <label class="form-control-label">Status: <span class="tx-danger">*</span></label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="1" {{ $products->status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $products->status == 0 ? 'selected' : '' }}>Inactive
                                        </option>
                                    </select>
                                    <div id="slErrorContainer"></div>
                                </div>

                            </div><!-- d-flex -->
                        </div><!-- col-4 -->
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="short_des">Short Description:<span class="tx-danger">*</span></label>
                                <textarea name="short_descp" class="form-control" id="inputProductDescription"
                                    rows="3">  {{ $products->short_descp }}</textarea>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="long_des">Long Description:<span class="tx-danger">*</span></label>
                                <textarea type="text" rows="3" class="form-control"
                                    name="long_descp">{!! $products->long_descp !!}</textarea>
                            </div>
                        </div><!-- col-4 -->

                        <div style="padding: 39px 0px 0px 0px;" class=" col-lg-3">
                            <div class="form-group">
                                <label class="ckbox">
                                    <input value="1" name="hot_deals" type="checkbox">
                                    <input class="form-check-input" name="hot_deals" type="checkbox" value="1"
                                        id="flexCheckDefault" {{ $products->hot_deals == 1 ? 'checked' : '' }} >
                                    <span>Hot Deals</span>
                                </label>
                            </div>
                        </div><!-- col-4 -->
                        <div style="padding: 39px 0px 0px 0px;" class=" col-lg-3">
                            <div class="form-group">
                                <label class="ckbox">
                                    <input value="1" name="featured" type="checkbox">
                                    <input class="form-check-input" name="featured" type="checkbox" value="1"
                                        id="flexCheckDefault" {{ $products->featured == 1 ? 'checked' : '' }} >
                                    <span>Featured Product</span>
                                </label>
                            </div>
                        </div><!-- col-4 -->


                        <div style="padding: 39px 0px 0px 0px;" class=" col-lg-3">
                            <div class="form-group">
                                <label class="ckbox">
                                    <input value="1" name="best_Seller" type="checkbox">
                                    <input class="form-check-input" name="best_Seller" type="checkbox" value="1"
                                        id="flexCheckDefault" {{ $products->best_Seller == 1 ? 'checked' : '' }} >
                                    <span>Best Seller</span>
                                </label>
                            </div>
                        </div><!-- col-4 -->
                        <div style="padding: 39px 0px 0px 0px;" class=" col-lg-3">
                            <div class="form-group">
                                <label class="ckbox">
                                    <input value="1" name="most_populer" type="checkbox">
                                    <input class="form-check-input" name="most_populer" type="checkbox" value="1"
                                        id="flexCheckDefault" {{ $products->most_populer == 1 ? 'checked' : '' }} >
                                    <span>Most Populer</span>
                                </label>
                            </div>
                        </div><!-- col-4 -->

                    </div><!-- row -->

                    <div class="form-layout-footer">
                        <button type="submit" class="btn btn-info">Update Product</button>
                    </div><!-- form-layout-footer -->
                </div><!-- form-layout -->




        </form>

        <div class="br-section-wrapper">
            <h6 class="br-section-label"> Mulipale Images</h6>


            <div class="form-layout form-layout-1">
                <p class="br-section-text">Manage Mulipale Images</p>
                <div class="row mg-b-25">

                    <div class="bd bd-gray-300 rounded table-responsive">
                        <form action="{{ route('UpdateProductMultiImg') }} " method="POST" enctype='multipart/form-data'>
                            @csrf
                            <table class="table table-hover mg-b-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Change Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $multiImgs as $key=> $img )
                                    <tr>
                                        <th scope="row">{{$key+1}}</th>
                                        <td>
                                            <img src="{{asset($img->photo_name)}}" style="width:70px;height:40px ;" alt="">
                                        </td>
                                        <td><input type="file" class="form-group" name="multi_img[{{ $img->id }}]"></td>
                                        <td>
                                            <input type="submit" class="btn btn-primary btn-sm px-4" value="UpdateImg" />
	                                        <a href="{{ route('multiImgDel',$img->id) }}" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </form>
                    </div><!-- bd -->
                </div>
            </div>
        </div>






    </div><!-- br-pagebody -->

</div><!-- br-mainpanel -->

<script>

    var code = "PRD" + Math.floor(Math.random() * 1000000);
    document.getElementById("genbutton").addEventListener("click", function () {
        var code = "PRO" + Math.floor(Math.random() * 1000000);
        document.getElementById("code").value = code;
    });


</script>


 {{-- // //single image
    // 	function mainThamUrl(input){
    // 		if (input.files && input.files[0]) {
    // 			var reader = new FileReader();
    // 			reader.onload = function(e){
    // 				$('#mainThmb').attr('src',e.target.result).width(80).height(80);
    // 			};
    // 			reader.readAsDataURL(input.files[0]);
    // 		}
    // 	}

    //     //multi image
    //     $(document).ready(function(){
    //    $('#multiImg').on('change', function(){ //on file input change
    //       if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
    //       {
    //           var data = $(this)[0].files; //this file data

    //           $.each(data, function(index, file){ //loop though each file
    //               if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
    //                   var fRead = new FileReader(); //new filereader
    //                   fRead.onload = (function(file){ //trigger function on successful read
    //                   return function(e) {
    //                       var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(100)
    //                   .height(80); //create image element
    //                       $('#preview_img').append(img); //append image to output element
    //                   };
    //                   })(file);
    //                   fRead.readAsDataURL(file); //URL representing the file's data.
    //               }
    //           });

    //       }else{
    //           alert("Your browser doesn't support File API!"); //if File API is absent
    //       }
    //    });
    //   }); --}}

    // Validation Form -->



@endsection
