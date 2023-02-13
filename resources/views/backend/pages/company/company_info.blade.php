@extends('backend.mastaring.master')

@section('content')

<div class="br-mainpanel">
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
            <h4>Company</h4>
            <p class="mg-b-0">Add Company Infromation </p>
        </div>
    </div>
    @if (session('status'))
    <h6 class="alert alert-success">{{ session('status') }}</h6>
    @endif

    <div class="br-pagebody">

        <form action="{{Route('store_company')}}" method="POST" enctype='multipart/form-data' data-parsley-validate>
            @csrf
            <div class="br-section-wrapper">
                <h6 class="br-section-label">Company</h6>
                <p class="br-section-text">Add Company Infromation.</p>

                <div class="form-layout form-layout-1">
                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Company Name: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="name" id="name"
                                    placeholder="Enter Company Name " required>

                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="email" name="email" id="email"
                                    placeholder="Enter Email Address" required>

                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Phone: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="number" name="phone" id="phone"
                                    placeholder="Enter Phone Number" required>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-control-label">Company Logo: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="file" name="logo" id="logo" required>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-3">
                            <div class="d-flex">
                                <div id="slWrapper" class="parsley-select wd-250">
                                    <label class="form-control-label">Status: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" data-placeholder="Choose one"
                                        data-parsley-class-handler="#slWrapper"
                                        data-parsley-errors-container="#slErrorContainer" required>
                                        <option label="Selet Status"></option>
                                        <option value="1">Active</option>
                                        <option value="2">Inactive</option>
                                    </select>
                                    <div id="slErrorContainer"></div>
                                </div>

                            </div><!-- d-flex -->
                        </div><!-- col-4 -->
                        <div class="col-lg-3">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label"> Address: <span class="tx-danger">*</span></label>
                                <textarea class="form-control" id="address" name="address" rows="4" cols="50"
                                    placeholder="Enter Company Discrition" required></textarea>
                            </div>
                        </div><!-- col-8 -->

                        <div class="col-lg-3">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label"> Discrition: <span class="tx-danger">*</span></label>
                                <textarea class="form-control" id="discrition" name="discrition" rows="4" cols="50"
                                    placeholder="Enter Company Discrition" required></textarea>
                            </div>
                        </div><!-- col-8 -->


                    </div><!-- row -->

                    <div class="form-layout-footer">
                        <button class="btn btn-info">Submit Form</button>
                    </div><!-- form-layout-footer -->
                </div><!-- form-layout -->
        </form>

    </div><!-- br-mainpanel -->

    @endsection
