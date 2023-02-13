@extends('backend.mastaring.master')

@section('content')

<div class="br-mainpanel">
      <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>Company</h4>
          <p class="mg-b-0">Slider</p>
        </div>
      </div>
       <div class="row">

        <form action="{{Route('SliderInfoUpdate')}}" method="POST" enctype='multipart/form-data'>

            @csrf

            <input type="hidden" name="id" value="{{$sliderEdit->id}}">
            <div class="br-section-wrapper">
                <h6 class="br-section-label">Our Clients</h6>
                <p class="br-section-text">Add our Clients</p>

            <div class="form-layout form-layout-1">
            <div class="row mg-b-25">
                <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label">Slider Title: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" value="{{$sliderEdit->title}}" name="title" id="title" placeholder="Enter Slider Name " required>

                </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label">Slider Title: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" value="{{$sliderEdit->slug}}" name="slug" id="slug" placeholder="Enter Slider Name " required>
                </div>
                </div><!-- col-4 -->

            <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label">Company Logo: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="file" name="image" id="image"  required>
                    <img class="mt-4 ml-5" height='50px' src="{{asset('backend/heroSlider/'.$sliderEdit->image)}}" alt="">
                </div>
                </div><!-- col-4 -->
            <!-- col-4 -->
            <div class="col-lg-4">
                <div class="form-group">
                    <textarea class="form-control" id="description" name="description" rows="4" cols="50" placeholder="Enter Slider description">{{$sliderEdit->slug}}</textarea>
                    </div>
                </div><!-- col-8 -->


            </div><!-- row -->



            <div class="form-layout-footer">
                <button class="btn btn-info">Update Slider</button>
            </div><!-- form-layout-footer -->
            </div><!-- form-layout -->
        </form>

        </div><!-- col-6 -->



    </div><!-- br-pagebody -->


    </div><!-- br-mainpanel -->

@endsection
