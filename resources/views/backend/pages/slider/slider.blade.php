@extends('backend.mastaring.master') @section('content')

<div class="br-mainpanel">
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
            <h4>bitBirds</h4>
            <p class="mg-b-0">Company Information</p>
        </div>
    </div>

    <div class="br-pagebody">




        <form action="{{Route('sliderStore')}}" method="POST" enctype='multipart/form-data' data-parsley-validate>
            @csrf
            <div class="br-section-wrapper">
                <h6 class="br-section-label">Our Clients</h6>
                <p class="br-section-text">Add our Clients</p>

                <div class="form-layout form-layout-1">
                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Slider Title: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="title" id="title"
                                    placeholder="Enter Slider Name " required />
                            </div>
                        </div>
                        <!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label"> Slug: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="slug" id="slug"
                                    placeholder="Enter Slider Name " required />
                            </div>
                        </div>
                        <!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Company Logo: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="file" name="image" id="image" required />
                            </div>
                        </div>
                        <!-- col-4 -->
                        <!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <textarea class="form-control" id="description" name="description" rows="4" cols="50"
                                    placeholder="Enter Slider description"></textarea>
                            </div>
                        </div>
                        <!-- col-8 -->

                        <div class="col-lg-5">
                            <!-- <div class="d-flex"> -->
                            <div id="slWrapper" class="parsley-select wd-300">
                                <label class="form-control-label">Status:<span class="tx-danger">*</span></label>
                                <select name="status" class="form-control select2" data-placeholder="Choose one"
                                    data-parsley-class-handler="#slWrapper"
                                    data-parsley-errors-container="#slErrorContainer" required>
                                    <option label="Selet Status"></option>
                                    <option value="1">Active</option>
                                    <option value="2">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- row -->

                    <div class="form-layout-footer">
                        <button class="btn btn-info">Submit Form</button>
                    </div>
                    <!-- form-layout-footer -->
                </div>

        </form>
    </div>
    <!-- br-pagebody -->
</div>
<!-- br-mainpanel -->

@endsection
