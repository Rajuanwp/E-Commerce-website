@extends('backend.mastaring.master')

@section('content')


<div class="br-mainpanel">
  <div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Company</h4>
      <p class="mg-b-0">Company Infromation Update </p>
    </div>
  </div>
  <!-- @if (session('status'))
  <h6 class="alert alert-success">{{ session('status') }}</h6>
  @endif -->


  <div class="br-pagebody">

    <form action="{{Route('brandUpdate')}}" method="POST" enctype='multipart/form-data' data-parsley-validate>
    @csrf
    <input type="hidden" name="id" value="{{$editBrand->id}}">
      <div class="br-section-wrapper">
        <h6 class="br-section-label">Company</h6>
        <p class="br-section-text">Company Infromation Update</p>

        <div class="form-layout form-layout-1">
          <div class="row mg-b-25">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label">Brand Name: <span class="tx-danger">*</span></label>
                <input class="form-control" value="{{$editBrand->name}}" type="text" name="name" id="name" placeholder="Enter Company Name "
                  required>

              </div>
            </div><!-- col-4 -->



            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label">Company Logo: <span class="tx-danger">*</span></label>
                <input class="form-control" type="file" name="logo" id="logo"  required>
                <img height='50px' src="{{asset('backend/Brand/'.$editBrand->logo)}}" alt="">
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-6">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label"> Discrition: <span class="tx-danger">*</span></label>
                  <textarea  class="form-control"   name="des" rows="4" cols="50"
                    placeholder="Enter Company Discrition" required>{{$editBrand->des}}</textarea>
                </div>
              </div><!-- col-8 -->


          </div><!-- row -->

          <div class="form-layout-footer">
            <button class="btn btn-info">Update Info</button>
          </div><!-- form-layout-footer -->
        </div><!-- form-layout -->
    </form>


  </div><!-- br-mainpanel -->

  @endsection
