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


<a class="btn btn-info mb-4" href="{{Route('NavMenuCreate')}}">Back To Create NavMenu</a>


<ul>
    @foreach($categories as $category)
        <li>
            {{ $category->name }}
            <form action="{{ route('NavMenu.destroy', $category->id) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
            </form>
            {{-- <a href="{{ route('categories.edit', $category->id) }}">Edit</a> --}}
            @if($category->children->count())
                @include('backend.pages.NavMenu.subcategories', ['subcategories' => $category->children])
            @endif
        </li>
    @endforeach
</ul>







    </div><!-- br-pagebody -->

</div><!-- br-mainpanel -->

@endsection
