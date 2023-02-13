@extends('backend.mastaring.master')

@section('content')

<div class="br-mainpanel">
  <div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Product Size</h4>
      <p class="mg-b-0">Add Product Size </p>
    </div>
  </div>

  <div class="br-pagebody">

    <form action="{{route('StoreSize')}}" method="POST" data-parsley-validate>
         @csrf
      <div class="br-section-wrapper">
        <h6 class="br-section-label">Size</h6>
        <p class="br-section-text">Add Size Infromation.</p>

        <div class="form-layout form-layout-1">
          <div class="row mg-b-25">
            <div class="col-lg-5">
              <div class="form-group">
                <label  class="form-control-label">Size Name: <span class="tx-danger">*</span></label>
                <input  data-role="tagsinput" class="form-control " type="text" name="size" id="size" placeholder="Input Produt Size Size">

              </div>
            </div><!-- col-4 -->

            <div class="col-lg-5">
              <div class="d-flex">
                <div id="slWrapper" class="parsley-select wd-550">
                  <label class="form-control-label">Status: <span class="tx-danger">*</span></label>
                  <select name="status" id="status"class="form-control select2" data-placeholder="Choose one"
                    data-parsley-class-handler="#slWrapper" data-parsley-errors-container="#slErrorContainer" required>
                    <option label="Selet Status"></option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                  </select>
                  <div id="slErrorContainer"></div>
                </div>

              </div><!-- d-flex -->
            </div><!-- col-4 -->
          </div><!-- row -->

          <div class="form-layout-footer">
            <button class="btn btn-info">Add Size</button>
          </div><!-- form-layout-footer -->
        </div><!-- form-layout -->
    </form>

<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

  </div><!-- br-mainpanel -->

  @endsection
