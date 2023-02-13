


<ul>

    @foreach($subcategories as $subcategory)
        <li>
            {{ $subcategory->name }}
            <form action="{{route('Navsubcategories.destroy', $subcategory->id)}}" method="post">
                @csrf
                @method('delete')
                <button class="btn btn-danger btn-sm" type="submit" class="btn btn-danger btn-sm"onclick="return confirm('Are you sure you want to delete this Sub-Category?')">Delete</button>
            </form>
            {{-- <a href="{{ route('subcategories.edit', $subcategory->id) }}">Edit</a> --}}
            @if($subcategory->children->count())
                @include('backend.pages.NavMenu.subcategories', ['subcategories' => $subcategory->children])
            @endif
        </li>
    @endforeach

</ul>
