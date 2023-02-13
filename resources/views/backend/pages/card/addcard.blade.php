@extends('backend.mastaring.master')

@section('content')

<div class="br-mainpanel">
      <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>Card</h4>
          <p class="mg-b-0">Add Card </p>
        </div>
      </div>
      @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif

      <div class="br-pagebody">
        <div class="row justify-content-center ">
        <div class="form-layout form-layout-4">
            <h4 class="text-center">Add Card</h4>
         

              <form action="{{route('addStore')}}" method="POST" enctype='multipart/form-data'>
                @csrf
                <div class="form-group">
                    <input class="form-control" type="text" name="title" id="title" placeholder="Enter Card Name ">
                </div>     
                <div class="form-group">
                <textarea class="form-control" id="description" name="description" rows="4" cols="50" placeholder="Enter Card description"></textarea>
                </div>
               

                <div class="form-group">
                    <input class="form-control" type="file" name="icon" id="icon" >
                </div>

                <div class="form-group">
                  <select class="form-control" name="status" id="status">
                    <option value="0">----Select Status----</option>
                    <option value="1">Active</option>
                    <option value="2">Inactive</option>
                  </select>
                </div>

                   <div class="form-layout-footer mg-t-30">
                  <button class="btn btn-info">Add Card</button>
                </div>
            </form>
          
        </div>
       
    </div><!-- col-6 -->
      </div><!-- br-pagebody -->
 
    </div><!-- br-mainpanel -->

@endsection