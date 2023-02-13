@extends('backend.mastaring.master')

@section('content')

<div class="br-mainpanel">
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
            <h4>Nav-Menu</h4>
            <p class="mg-b-0">Add Nav-Menu</p>
        </div>
    </div>


    <div class="br-pagebody">
    <form action="{{route('NavMenuStore')}}" method="POST"  data-parsley-validate>

    @csrf

      <div class="br-section-wrapper">
        <h6 class="br-section-label">Nav-Menu</h6>
        <p class="br-section-text">Add Nav-Menu Infromation.</p>

        <div class="form-layout form-layout-1">
          <div class="row mg-b-25">
            <div class="col-lg-3">
              <div class="form-group">
                <label class="form-control-label">Menu Name: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="name" id="name" placeholder="Enter Category Name "
                  required>
              </div>
            </div><!-- col-4 -->
           <!-- col-4 -->

           <div class="col-lg-3">
            <div class="d-flex">
              <div id="slWrapper" class="parsley-select wd-250">
                <label class="form-control-label">Parent Category: <span class="tx-danger">*</span></label>
                <select id="parent_id" name="parent_id" class="form-control">
                    <option value="">Select Parent Category</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                <div id="slErrorContainer"></div>
              </div>

            </div><!-- d-flex -->
          </div><!-- col-4 -->

            <div class="col-lg-3">
              <div class="d-flex">
                <div id="slWrapper" class="parsley-select wd-250">
                  <label class="form-control-label">Status: <span class="tx-danger">*</span></label>
                  <select name="status" class="form-control select2" data-placeholder="Choose one"
                    data-parsley-class-handler="#slWrapper" data-parsley-errors-container="#slErrorContainer" required>
                    <option label="Selet Status"></option>
                    <option value="1">Active</option>
                    <option value="2">Inactive</option>
                  </select>
                  <div id="slErrorContainer"></div>
                </div>

              </div><!-- d-flex -->
            </div><!-- col-4 -->

          </div><!-- row -->

          <div class="form-layout-footer">
            <button class="btn btn-info">Create Menu</button>
          </div><!-- form-layout-footer -->
        </div><!-- form-layout -->
    </form>


    </div><!-- br-pagebody -->

</div><!-- br-mainpanel -->

@endsection
