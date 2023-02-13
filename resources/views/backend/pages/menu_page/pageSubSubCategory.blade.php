@extends('backend.mastaring.master')

@section('content')

<div class="br-mainpanel">
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
            <h4>Create Sub Page</h4>
            <p class="mg-b-0">Add Page</p>
        </div>
    </div>
    @if (session('status'))
    <h6 class="alert alert-success">{{ session('status') }}</h6>
    @endif

    <div class="br-pagebody">
        <div class="row">


            <form action="{{route('SubSubPageAdd')}}"  method="POST">

                @csrf
                <div class="form-group">
                  <select class="form-control" name="sub_page_cat_id" id="sub_page_cat_id">

                    <option value="">----Select Category----</option>
                   @foreach($page_sub_cate as $sub_cat)
                    <option value="{{$sub_cat->id}}">{{$sub_cat->sub_name}}</option>
                  @endforeach
                    
                  </select>
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="sub_sub_name" id="sub_sub_name" placeholder="Enter Page Name ">
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="sub_sub_cat_dis" name="sub_sub_cat_dis" rows="4" cols="50"
                        placeholder="Enter Page Discrition"></textarea>
                </div>

                <div class="form-group">
                    <input class="form-control" type="text" name="slug" id="slug" placeholder="Enter Slug ">
                </div>

                <div class="form-group">
                    <select class="form-control" name="status" id="status">
                        <option value="1">----Status-----</option>
                        <option value="1">Active</option>
                        <option value="2">Inactive</option>
                    </select>
                </div>
                <div class="form-layout-footer mg-t-30">
                    <button class="btn btn-info">Add Page</button>
                </div>
            </form>

        </div><!-- col-6 -->



    </div><!-- br-pagebody -->

</div><!-- br-mainpanel -->




@endsection