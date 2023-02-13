@extends('backend.mastaring.master')

@section('content')

<div class="br-mainpanel">
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
            <h4>Create Page</h4>
            <p class="mg-b-0">Add Page</p>
        </div>
    </div>
    @if (session('status'))
    <h6 class="alert alert-success">{{ session('status') }}</h6>
    @endif

    <div class="br-pagebody">
        <div class="row">


            <form action="{{route('pageAdd')}}"  method="POST">

                @csrf
                <div class="form-group">
                    <input class="form-control" type="text" name="page_cat_name" id="page_cat_name" placeholder="Enter Page Name ">
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="page_dis" name="page_dis" rows="4" cols="50"
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