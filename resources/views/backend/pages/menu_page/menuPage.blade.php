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
        <div class="col-md-3">


            <!-- <form action="{{route('SubSubPageAdd')}}"  method="POST"> -->


            <div class="form-group">
                <label for="">Select Main Page</label>
                <select class="form-control" name="" id="main_page">

                    <option value="">----Select Category----</option>

                    @if(!empty($home_pape_categories))
                    @foreach($home_pape_categories as $main_page)

                    <option value="{{$main_page->id}}">{{$main_page->page_cat_name}}</option>
                    @endforeach

                    @endif



                </select>
            </div>
            <div class="form-group">
                <label for="">Select Sub Category</label>
                <select id="subCat-dd" class="form-control">
                </select>
            </div>

            <div class="form-group">
                <label for="">Select Sub-Sub Category</label>
                <select id="subSubCat" class="form-control">
                </select>
            </div>


            <div class="form-group">

                <label for="">Select Status</label>
                <select class="form-control" name="status" id="status">

                    <option value="1">----Status-----</option>
                    <option value="1">Active</option>
                    <option value="2">Inactive</option>
                </select>
            </div>

            <div class="form-layout-footer mg-t-30">
                <button class="btn btn-info">Add Page </button>
            </div>

            <!-- </form> -->

        </div><!-- col-6 -->




    </div><!-- br-pagebody -->

</div><!-- br-mainpanel -->



@endsection