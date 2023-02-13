

@extends('backend.mastaring.master')

@section('content')

<div class="br-mainpanel">
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
            <h4>Category</h4>
            <p class="mg-b-0">Add Category</p>
        </div>
    </div>


    <div class="br-pagebody">
        <div class="card-body">
            <h4 class="card-title">Edit Subcategory</h4>
            <form action="{{ route('subcategories.update', $subcategory->id) }}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $subcategory->name }}">
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="1" {{ $subcategory->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $subcategory->status == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>



    </div><!-- br-pagebody -->

</div><!-- br-mainpanel -->

@endsection

