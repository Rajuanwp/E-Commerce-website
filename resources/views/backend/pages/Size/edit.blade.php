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
    <form action="{{route('UpdateSize')}}" method="POST">
         @csrf
         <input type="hidden" name="id" value="{{$editSize->id}}">
      <div class="br-section-wrapper">
        <h6 class="br-section-label">Size</h6>
        <p class="br-section-text">Add Size Infromation.</p>

        <div class="form-layout form-layout-1">
          <div class="row mg-b-25">
            <div class="col-lg-5">
              <div class="form-group">
                <label  class="form-control-label">Size Name: <span class="tx-danger">*</span></label>
                <input  data-role="tagsinput" class="form-control " type="text" name="size" id="size" value="<?php echo implode(',',json_decode($editSize->size)) ?>">

              </div>
            </div><!-- col-4 -->

            <div class="col-lg-5">
              <div class="d-flex">
                <div id="slWrapper" class="parsley-select wd-550">
                  <label class="form-control-label">Status: <span class="tx-danger">*</span></label>
                  <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="1" {{ $editSize->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $editSize->status == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                  <div id="slErrorContainer"></div>
                </div>

              </div><!-- d-flex -->
            </div><!-- col-4 -->
          </div><!-- row -->

          <div class="form-layout-footer">
            <button class="btn btn-info">Update Size</button>
          </div><!-- form-layout-footer -->
        </div><!-- form-layout -->
    </form>

<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

  </div><!-- br-mainpanel -->

  @endsection
