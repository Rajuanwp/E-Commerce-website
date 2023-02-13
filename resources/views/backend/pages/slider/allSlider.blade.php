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

        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">description</th>
                    <th scope="col">slug</th>
                    <th scope="col">image</th>
                    <th scope="col">status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $allSlider as $data)
                <tr>
                    <th>{{$data->id}}</th>
                    <th>{{$data->title}}</th>
                    <th>{{$data->slug}}</th>
                    <th>{{$data->description}}</th>
                    <th>
                        <img height='50px' src="{{asset('backend/heroSlider/'.$data->image)}}" alt="">
                    </th>
                    <th>
                        @if($data->status==1)
                        <a href="{{route('sliderStatus',$data->id)}}" class="btn btn-success btn-sm">Active</a>

                        @else
                        <a href="{{route('sliderStatus',$data->id)}}" class="btn btn-warning btn-sm">Inactive</a>

                        @endif
                    </th>


                    <th>

                        <a href="{{route('SliderInfoEdit',$data->id)}}" class="btn btn-warning btn-sm"><i
                                class="fa fa-edit"></i></a>
                        <button data-toggle="modal" data-target="#SliderDelete{{ $data->id }}"
                            class="btn btn-danger mt-2 btn-sm"><i class="fa fa-trash"></i></button>
                    </th>

                </tr>

                </tr>


                <div class="modal fade" id="SliderDelete{{ $data->id }}" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Congratulations Message </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are You Wont To Delete This Slider ?
                                <div class="modal-footer">
                                    <a href="{{route('SliderInfoDelete',$data->id)}}"
                                        class="btn btn-danger mt-2 btn-sm">Delete</a>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                @endforeach


        </table>

    </div>
    <!-- br-pagebody -->
</div>
<!-- br-mainpanel -->

@endsection
