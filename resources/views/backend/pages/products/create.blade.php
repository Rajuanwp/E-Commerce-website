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
            <form  action="{{ route('StoreProduct') }} " method="POST" enctype='multipart/form-data'>

                @csrf

                <div class="br-section-wrapper">
                    <h6 class="br-section-label">Add New Product</h6>
                    <p class="br-section-text">Add Product Infromation.</p>

                    <div class="form-layout form-layout-1">
                        <div class="row mg-b-25">
                            <div class="form-group col-lg-3">
                                <div class="d-flex">
                                    <div id="slWrapper" class="parsley-select wd-250">
                                        <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                                        <select class="form-control" id="category_id" name="category_id" required>
                                            <option value="">Select Category</option>
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
                                        <select class="form-control" id="brand_id" name="brand_id" required>
                                            <option value="">Select Brand</option>
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
                                        <select class="form-control" id="brand_id" name="brand_id" required>
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
                                    <input type="text" class="form-control" id="product_name" name="product_name"
                                        placeholder="Product Name" required>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="product_tags">Product Tag:<span class="tx-danger">*</span></label>
                                    <input type="text" value="Tag," name="product_tags" id="product_tags"
                                        data-role="tagsinput" placeholder="Product Tags" required>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="product_size">Product Size:<span class="tx-danger">*</span></label>
                                    <input type="text" value="S,M" name="product_size" id="product_size"
                                        data-role="tagsinput" placeholder="Product Size" >
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="product_color">Product Color:<span class="tx-danger">*</span></label>
                                    <input type="text" value="RED," name="product_color" id="product_color"
                                        data-role="tagsinput" placeholder="Product Color" >
                                </div>
                            </div><!-- col-4 -->

                            {{-- <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="product_slug">Product Slug:<span class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" id="product_slug" name="product_slug"
                                        placeholder="Product Slug" >
                                </div>
                            </div><!-- col-4 --> --}}
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="price">Price:<span class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" id="selling_price" name="selling_price"
                                        placeholder="Product Price" required>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="discount_price">Discount Price:<span class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" id="discount_price" name="discount_price"
                                        placeholder="Product Price" >
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="discount_price">Product Qty:<span class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" id="product_qty" name="product_qty"
                                        placeholder="Product Qty" required>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="product_code">Product Code:<span class="tx-danger">*</span></label>
                                    <input type="text" name="product_code" class="mt-1 form-control" id="code"
                                        aria-describedby="product_code" required>
                                    <div class="input-group-append float-right ">
                                        <button id="genbutton" type="button" class=" mt-1 btn btn-sm btn-info">code</button>
                                    </div>
                                </div>
                            </div><!-- col-4 -->


                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="product_thambnail">Featured Image:<span class="tx-danger">*</span></label>
                                    <input type="file" class="form-control" id="product_thambnail" name="product_thambnail"
                                       >
                                    <img class="mt-3" src="" id="mainThmb" alt="">
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="multi_img">Multipale Image:<span class="tx-danger">*</span></label>
                                    <input class="form-control" name="multi_img[]" type="file" id="multiImg" multiple=""
                                        >
                                    <div class="row mt-3" id="preview_img"></div>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-3">
                                <div class="d-flex">
                                    <div id="slWrapper" class="parsley-select wd-250">
                                        <label class="form-control-label">Status: <span class="tx-danger">*</span></label>
                                        <select class="form-control" id="status" name="status" >
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                        <div id="slErrorContainer"></div>
                                    </div>

                                </div><!-- d-flex -->
                            </div><!-- col-4 -->

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="short_des">Short Description:<span class="tx-danger">*</span></label>
                                    <textarea type="text" class="form-control" id="short_descp" name="short_descp"
                                        placeholder="Short Description" > </textarea>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="long_des">Long Description:<span class="tx-danger">*</span></label>
                                    <textarea type="text"  class="form-control" name="long_descp" ></textarea>
                                </div>
                            </div><!-- col-4 -->

                            <div style="padding: 39px 0px 0px 0px;" class=" col-lg-3">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input value="1" name="hot_deals" type="checkbox">
                                        <span>Hot Deals</span>
                                    </label>
                                </div>
                            </div><!-- col-4 -->
                            <div style="padding: 39px 0px 0px 0px;" class=" col-lg-3">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input value="1" name="featured" type="checkbox">
                                        <span>Featured Product</span>
                                    </label>
                                </div>
                            </div><!-- col-4 -->


                            <div style="padding: 39px 0px 0px 0px;" class=" col-lg-3">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input value="1" name="best_Seller" type="checkbox">
                                        <span>Best Seller</span>
                                    </label>
                                </div>
                            </div><!-- col-4 -->
                            <div style="padding: 39px 0px 0px 0px;" class=" col-lg-3">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input value="1" name="most_populer" type="checkbox">
                                        <span>Most Populer</span>
                                    </label>
                                </div>
                            </div><!-- col-4 -->

                        </div><!-- row -->

                        <div class="form-layout-footer">
                            <button type="submit" class="btn btn-info">Add Product</button>
                        </div><!-- form-layout-footer -->
                    </div><!-- form-layout -->




            </form>

        </div><!-- br-pagebody -->

    </div><!-- br-mainpanel -->

    <script>

        var code = "PRD" + Math.floor(Math.random() * 1000000);
        document.getElementById("genbutton").addEventListener("click", function () {
            var code = "PRO" + Math.floor(Math.random() * 1000000);
            document.getElementById("code").value = code;
        });


    </script>


    <!-- // //single image
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
    //   });

    // Validation Form -->



@endsection
