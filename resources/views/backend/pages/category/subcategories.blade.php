
 @foreach($subcategories as $subcategory)
 <tr>

    <td> </td>
    <td>-- {{ $subcategory->name }}</td>
    <td></td>
    <td></td>

    <td>
        @if($subcategory->status==1)
        <a href="{{route('subcategoryStatus',$subcategory->id)}}" class="btn btn-success btn-sm">Active</a>

        @else

        <a href="{{route('subcategoryStatus',$subcategory->id)}}" class="btn btn-warning btn-sm">Inactive</a>

        @endif
    </td>
    <td>
        <form action="{{route('subcategories.destroy', $subcategory->id)}}" method="post">
            @csrf
            @method('delete')
            <button class="btn btn-danger btn-sm" type="submit" class="btn btn-danger btn-sm"onclick="return confirm('Are you sure you want to delete this Sub-Category?')"><i class="fa fa-trash"></i></button>
        </form>
        <a class="btn btn-primary btn-sm mt-2" href="{{ route('subcategories.edit', $subcategory->id) }}"><i class="fa fa-edit"></i></a>
    </td>

    <td>
        @if($subcategory->children->count())
                @include('backend.pages.category.subcategories', ['subcategories' => $subcategory->children])
            @endif
    </td>

</tr>

@endforeach


