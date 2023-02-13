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

    <form action="{{Route('company_info_update')}}" method="POST" enctype='multipart/form-data' data-parsley-validate>
    @csrf
    <input type="hidden" name="id" value="{{$company_info_edit->id}}">      
      <div class="br-section-wrapper">
        <h6 class="br-section-label">Company</h6>
        <p class="br-section-text">Company Infromation Update</p>

        <div class="form-layout form-layout-1">
          <div class="row mg-b-25">
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Company Name: <span class="tx-danger">*</span></label>
                <input class="form-control" value="{{$company_info_edit->name}}" type="text" name="name" id="name" placeholder="Enter Company Name "
                  required>

              </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                <input class="form-control" value="{{$company_info_edit->email}}" type="email" name="email" id="email" placeholder="Enter Email Address"
                  required>

              </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Phone: <span class="tx-danger">*</span></label>
                <input class="form-control" value="{{$company_info_edit->phone}}" type="number" name="phone" id="phone" placeholder="Enter Phone Number"
                  required>
              </div>
            </div><!-- col-4 -->

            <div class="col-lg-3">
              <div class="form-group">
                <label class="form-control-label">Company Logo: <span class="tx-danger">*</span></label>
                <input class="form-control" type="file" name="logo" id="logo"  required>
                <img height='50px' src="{{asset('backend/company_logo/'.$company_info_edit->logo)}}" alt="">
              </div>
            </div><!-- col-4 -->
            
            <div class="col-lg-4">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label"> Address: <span class="tx-danger">*</span></label>
                <textarea class="form-control" id="address" name="address" rows="4" cols="50"
                  placeholder="Enter Company Discrition" required>{{$company_info_edit->address}}</textarea>
              </div>
            </div><!-- col-8 -->

            <div class="col-lg-5">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label"> Discrition: <span class="tx-danger">*</span></label>
                <textarea class="form-control"  id="discrition" name="discrition" rows="4" cols="50"
                  placeholder="Enter Company Discrition" required>{{$company_info_edit->discrition}}</textarea>
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