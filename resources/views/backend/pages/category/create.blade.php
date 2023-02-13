@extends('backend.mastaring.master')

@section('content')

<div class="br-mainpanel">
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
            <h4>Category</h4>
            <p class="mg-b-0">Add Category</p>
        </div>
    </div>


    <div class="br-pagebody">
    <form action="{{route('categoriesStore')}}" method="POST" enctype='multipart/form-data' data-parsley-validate>

        @csrf

                <div class="br-section-wrapper">
                    <h6 class="br-section-label">Category</h6>
                    <p class="br-section-text">Add Category Infromation.</p>

                    <div class="form-layout form-layout-1">
                    <div class="row mg-b-25">
                        <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Category Name: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="name" id="name" placeholder="Enter Category Name "
                            required>

                        </div>
                        </div><!-- col-4 -->
                    <!-- col-4 -->

                    <div class="col-lg-3">
                        <div class="d-flex">
                        <div id="slWrapper" class="parsley-select wd-250">
                            <label class="form-control-label">Parent Category:</label>
                            <select id="parent_id" name="parent_id" class="form-control">
                                <option value="">Select Parent Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            <div id="slErrorContainer"></div>
                        </div>

                        </div><!-- d-flex -->
                    </div><!-- col-4 -->



                        <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Category Picture: </label>
                            <input class="form-control" type="file" name="image" id="image"  >
                        </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-3">
                        <div class="d-flex">
                            <div id="slWrapper" class="parsley-select wd-250">
                            <label class="form-control-label">Status: <span class="tx-danger">*</span></label>
                            <select name="status" class="form-control select2" data-placeholder="Choose one"
                                data-parsley-class-handler="#slWrapper" data-parsley-errors-container="#slErrorContainer" required>
                                <option label="Selet Status"></option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                            <div id="slErrorContainer"></div>
                            </div>

                        </div><!-- d-flex -->
                        </div><!-- col-4 -->
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description"></textarea>
                            </div>
                        </div><!-- col-4 -->

                    </div><!-- row -->

                    <div class="form-layout-footer">
                        <button class="btn btn-info">Create Category</button>
                    </div><!-- form-layout-footer -->
                    </div><!-- form-layout -->
    </form>


    </div><!-- br-pagebody -->

</div><!-- br-mainpanel -->

{{-- Image option disable whene select parent_id JS Code --}}

<script>


document.getElementById("parent_id").addEventListener("change", function() {
    if (this.value !== "") {
        document.getElementById("image").setAttribute("disabled", "disabled");
    } else {
        document.getElementById("image").removeAttribute("disabled");
    }
});

 </script>

 {{-- Image option disable whene select parent_id JS Code --}}



@endsection
