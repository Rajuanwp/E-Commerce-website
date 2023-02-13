@extends('backend.mastaring.master') @section('content')

<div class="br-mainpanel">
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
            <h4>bitBirds</h4>
            <p class="mg-b-0">Company Information</p>
        </div>
    </div>

    <div class="br-pagebody">
        <div class="row"></div>
        <div class="br-section-wrapper">
            <h6 class="br-section-label">Our Company Information</h6>

            <p class="br-section-text">Searching, ordering and paging goodness will be immediatelyadded to the table, as shown in this example.</p>


            <!-- Modal Add Client -->
            <div class="modal fade" id="addClients" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Colour</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('StoreColour')}}" method="POST" enctype='multipart/form-data'>

                                @csrf
                                <div class="form-group">
                                    <input data-role="tagsinput" class="form-control " type="text" name="colour"
                                        id="colour" placeholder="Input Produt Colour ">
                                </div>

                                <div class="form-group">
                                    <select class="form-control" name="status" id="status">
                                        <option value="1">----Status-----</option>
                                        <option value="1">Active</option>
                                        <option value="2">Inactive</option>
                                    </select>
                                </div>
                                <div class="form-layout-footer mg-t-30">
                                    <button class="btn btn-info">Submit</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Modal Add Client -->

            <button type="button" class="btn btn-primary btn-lg float-right mb-4" data-toggle="modal"
                data-target="#addClients">
                Add Size
            </button>



            <div class="table-wrapper">
                <table id="example" class="table table-striped table-bordered" style="width: 100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Size</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $id=1;
                            ?>
                        @foreach($ColourInfo as $data)
                        <tr>
                            <th>{{ $id}}</th>
                            <th>
                                @foreach ( json_decode($data->colour) as $colours)
                                <ul>
                                    <li>
                                        {{$colours}}
                                    </li>
                                </ul>
                                @endforeach
                            </th>
                            <th>
                                @if($data->status==1)
                                <a href="{{route('StatusColour',$data->id)}}" class="btn btn-success btn-sm">Active</a>

                                @else

                                <a href="{{route('StatusColour',$data->id)}}"
                                    class="btn btn-warning btn-sm">Inactive</a>

                                @endif
                            </th>

                            <th>
                                <a href="{{route('EditColour',$data->id)}}" class="btn btn-warning btn-sm"><i
                                        class="fa fa-edit"></i></a>
                                <button data-toggle="modal" data-target="#colourdtdelete{{ $data->id }}"
                                    class="btn btn-danger mt-2 btn-sm"><i class="fa fa-trash"></i></button>
                            </th>
                        </tr>

                        <!-- Button trigger modal -->


                        <!-- Modal -->
                        <div class="modal fade" id="colourdtdelete{{ $data->id }}" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Congratulations Message </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are You Wont To Delete This Colour;
                                        <div class="modal-footer">
                                            <a href="{{route('DeleteColour',$data->id)}}"
                                                class="btn btn-danger mt-2 btn-sm">Delete</a>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
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
<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

@endsection
