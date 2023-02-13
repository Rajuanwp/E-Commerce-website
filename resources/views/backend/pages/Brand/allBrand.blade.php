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
            <p class="br-section-text">
                Searching, ordering and paging goodness will be immediately
                added to the table, as shown in this example.
            </p>



 <!-- Modal Add Client -->
 <div class="modal fade" id="addClients" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
 aria-hidden="true">
 <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLabel">Add Clients</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     <div class="modal-body">
       <form action="{{route('storeBrand')}}" method="POST" enctype='multipart/form-data'>

         @csrf
         <div class="form-group">
           <input class="form-control" type="text" name="name" id="name" placeholder="Enter Company Name ">
         </div>
         <div class="form-group">
           <textarea class="form-control" id="des" name="des" rows="4" cols="50"
             placeholder="Enter Company Discrition"></textarea>
         </div>

         <div class="form-group">
           <input class="form-control" type="file" name="logo" id="logo">
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
Add Brand
</button>



            <div class="table-wrapper">
                <table id="example" class="table table-striped table-bordered" style="width: 100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Logo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $id=1;
                            ?>
                        @foreach($BrandInfo as $data)
                            <tr>
                                <th>{{ $id}}</th>
                                <th>{{ $data->name}}</th>
                                <th>{{ $data->des}}</th>
                                <th>
                                    @if($data->status==1)
                                    <a href="{{route('brandStatus',$data->id)}}" class="btn btn-success btn-sm">Active</a>

                                    @else
                                    <a href="{{route('brandStatus',$data->id)}}" class="btn btn-warning btn-sm">Inactive</a>

                                    @endif
                                </th>
                                <th>
                                    <img height="50px" src="{{asset('backend/Brand/'.$data->logo)}}" alt="" />
                                </th>
                                <th>
                                    <a href="{{route('brandEdit',$data->id)}}" class="btn btn-warning btn-sm"><i
                                            class="fa fa-edit"></i></a>
                                    <button data-toggle="modal" data-target="#brandtdelete{{ $data->id }}"
                                        class="btn btn-danger mt-2 btn-sm"><i class="fa fa-trash"></i></button>
                                </th>
                            </tr>

                        <!-- Button trigger modal -->


                                <!-- Modal -->
                                <div class="modal fade" id="brandtdelete{{ $data->id }}" role="dialog"
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
                                                Are You Wont To Delete This brand;
                                                <div class="modal-footer">
                                                    <a href="{{route('brandDelete',$data->id)}}"
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
                    <!-- <tfoot>
            <tr>
                <th>Name</th>

                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot> -->
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
