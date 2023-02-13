@extends('backend.mastaring.master') @section('content')

<div class="br-mainpanel">
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
            <h4>bitBirds</h4>
            <p class="mg-b-0">Product Information</p>
        </div>
    </div>


    <div class="br-pagebody">
        <div class="row"></div>
        <div class="br-section-wrapper">
            <h6 class="br-section-label">Product Information</h6>
            <p class="br-section-text">
                Searching, ordering and paging goodness will be immediately
                added to the table, as shown in this example.
            </p>
            <div class="text-right mb-2">
                <a href="{{route('AddProduct')}}" class="btn btn-info ">Add Product</a>
            </div>

            <h4>Totla Number of Product : <span>{{count($allProduct)}}</span></h4>
            <div class="table-wrapper">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Featured Image</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Discount Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $id=1;
                            ?>
                        @foreach ($allProduct as $data)
                        {{-- {{dd($data->product_thambnail)}} --}}
                        <tr>
                            <td>{{ $id }}</td>
                            <td>{{ $data->product_name }}</td>
                            <td>{{ $data->short_descp }}</td>

                            <td>{{ $data->category->name }}</td>
                            <td><img src="{{asset($data->product_thambnail) }}" alt="product image" width="50"
                                    height="50"></td>
                            <td>{{ $data->product_qty }}</td>
                            <td>{{ $data->selling_price }}</td>
                            {{-- <td>{{ $data->discount_price }}</td> --}}
                            <td>

                                @if($data->discount_price == NULL)
                                <span class="badge rounded-pill bg-info">No Discount</span>
                                @else
                                @php
                                $amount = $data->selling_price - $data->discount_price;
                                $discount = ($amount/$data->selling_price) * 100;
                                @endphp
                                <span class="badge rounded-pill bg-danger"> {{ round($discount) }}%</span>
                                @endif

                            </td>
                            <td>

                                @if($data->status==1)
                                <a title="You can status Inactive " href="{{route('StatusProduct',$data->id)}}"
                                    class="btn btn-success btn-sm">Active</a>

                                @else

                                <a title="You can status Active " href="{{route('StatusProduct',$data->id)}}"
                                    class="btn btn-warning btn-sm">Inactive</a>

                                @endif
                            </td>
                            <td>
                                <a href="{{ route('EditProduct', $data->id) }}" title="Edit Product"
                                    class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                <form action="{{ route('DeleteProduct', $data->id) }}" method="POST"
                                    style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button title="Delete Product" type="submit" class="btn btn-danger btn-sm"><i
                                            class="fa fa-trash"></i></button>
                                </form>

                            </td>
                        </tr>
                        <?php
                      $id++;
                      ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- table-wrapper -->
        </div>
        <!-- col-6 -->
    </div>
    <!-- br-pagebody -->
</div>
<!-- br-mainpanel -->


@endsection
