@extends('backend.mastaring.master')

@section('content')

<div class="br-mainpanel">
  <div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>bitBirds</h4>
      <p class="mg-b-0">Company Information</p>
    </div>
  </div>

  <div class="br-pagebody">
    <div class="row">

      <div class="col-md-10">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Description</th>
              <th scope="col">Icon</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($allCard as $data)
            <tr>
              <th>{{$data->id}}</th>
              <th>{{$data->title}}</th>
              <th>{{$data->description}}</th>
              <th>
                <img height='100px' src="{{asset('backend/card/'.$data->icon)}}" alt="">
              </th>
              <th>
                @if($data->status==1)
                <a href="{{route('cardStatus',$data->id)}}" class="btn btn-success btn-sm">Active</a>

                @else
                <a href="{{route('cardStatus',$data->id)}}" class="btn btn-warning btn-sm">Inactive</a>

                @endif
              </th>
              <th>

                <a href="" data-toggle="modal" data-target="#exampleModal" class="btn btn-warning btn-sm"><i
                    class="fa fa-edit"></i></a>
                <a href="" class="btn btn-danger mt-2 btn-sm"><i class="fa fa-trash"></i></a>
              </th>

            </tr>
            @endforeach

          </tbody>
        </table>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Information </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="" method="POST" enctype='multipart/form-data'>
                  @csrf
                  <div class="form-group">
                    <input class="form-control" type="text" name="name" id="name" value=""
                      placeholder="Enter Company Name ">
                  </div>
                  <div class="form-group">
                    <input class="form-control" type="email" name="email" id="email"
                      placeholder="Enter Company Email  ">
                  </div>
                  <div class="form-group">
                    <input class="form-control" type="number" name="phone" id="phone"
                      placeholder="Enter Company Phone Number  ">
                  </div>
                  <div class="form-group">
                    <textarea class="form-control" id="address" name="address" rows="4" cols="50"
                      placeholder="Enter Company Address"></textarea>
                  </div>
                  <div class="form-group">
                    <textarea class="form-control" id="discrition" name="discrition" rows="4" cols="50"
                      placeholder="Enter Company Discrition"></textarea>
                  </div>

                  <div class="form-group">
                    <input class="form-control" type="file" name="logo" id="logo">
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Update Info</button>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>

      </div>

    </div><!-- col-6 -->



  </div><!-- br-pagebody -->

</div><!-- br-mainpanel -->

@endsection