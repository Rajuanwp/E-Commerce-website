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


<a class="btn btn-info mb-4" href="{{Route('categoriesCreate')}}">Back To Create Category</a>


<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Category Name</th>
            <th>Description</th>
            <th>Product</th>
            <th>Status</th>
            <th colspan="2" >Action</th>

        </tr>
    </thead>
    <tbody>
        <?php
        $id=1;
            ?>
        @foreach($categories as $category)
        <tr>
            <td> {{ $id }}</td>
            <td> {{ $category->name }}</td>
            <td> {{ $category->description }}</td>
            <td></td>

    <td>
        @if($category->status==1)
        <a href="{{route('categoryStatus',$category->id)}}" class="btn btn-success btn-sm">Active</a>

        @else

        <a href="{{route('categoryStatus',$category->id)}}" class="btn btn-warning btn-sm">Inactive</a>

        @endif
    </td>
            <td colspan="2">
                <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this category?')"><i class="fa fa-trash"></i></button>
                </form>
                <a class="btn btn-primary btn-sm mt-2" title="" href="{{ route('categories.edit', $category->id) }}"><i class="fa fa-edit"></i></a>
            </td>

            <td>
                @if($category->children->count())
                    @include('backend.pages.category.subcategories', ['subcategories' => $category->children])
                @endif
            </td>

        </tr>
        <?php
$id++;
?>
        @endforeach
    </tbody>



</table>


<script>
    $(document).ready(function() {
        $('#categoriesTable').DataTable();
    });
</script>



</div><!-- br-pagebody -->

</div><!-- br-mainpanel -->

@endsection
