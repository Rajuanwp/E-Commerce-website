@extends('backend.mastaring.master')

@section('content')

<div class="br-mainpanel">
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
            <h4>Our Clients</h4>
            <p class="mg-b-0">Add our Clients</p>
        </div>
    </div>
    @if (session('status'))
    <h6 class="alert alert-success">{{ session('status') }}</h6>
    @endif

    <div class="br-pagebody">
        <div class="row">

<form action="{{route('updateClient')}}"  method="POST" enctype='multipart/form-data' data-parsley-validate>
    @csrf
    <input class="form-control" type="hidden" value="{{$editClient->id}}" name="id" id="id" >
      <div class="br-section-wrapper">
        <h6 class="br-section-label">Our Clients</h6>
        <p class="br-section-text">Add our Clients</p>
        <div class="form-layout form-layout-1">
          <div class="row mg-b-25">
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Company Name: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" value="{{$editClient->name}}" name="name" id="name" placeholder="Enter Company Name "
                  required>
              </div>
            </div><!-- col-4 -->


            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Company Logo: <span class="tx-danger">*</span></label>
                <input class="form-control" type="file" name="logo" id="logo"  required>
              </div>
            </div><!-- col-4 -->

            <div class="col-lg-6">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label"> Discrition: <span class="tx-danger">*</span></label>
                <textarea class="form-control"id="description" name="description" rows="4" cols="50"
                  placeholder="Enter Company Description" required>{{$editClient->description}}</textarea>
              </div>
            </div><!-- col-8 -->
          </div><!-- row -->

          <div class="form-layout-footer">
            <button class="btn btn-info">Update</button>
          </div><!-- form-layout-footer -->
        </div><!-- form-layout -->
    </form>

        </div><!-- col-6 -->



    </div><!-- br-pagebody -->

</div><!-- br-mainpanel -->




@endsection
