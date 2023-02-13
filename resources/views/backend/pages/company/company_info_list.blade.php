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

            <div class="table-wrapper">
                <table id="example"class="table table-striped table-bordered"style="width: 100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>phone</th>
                            <th>Logo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($company_info_list as $data)
                        <tr>
                            <th>{{ $data->id}}</th>
                            <th>{{ $data->name}}</th>
                            <th>{{ $data->email}}</th>
                            <th>{{ $data->address}}</th>
                            <th>{{ $data->phone}}</th>
                            <th>
                                <img height="100px" src="{{asset('backend/company_logo/'.$data->logo)}}"alt=""/>
                            </th>
                            <th>
                                <a href="{{route('company_info_edit',$data->id)}}"class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
								<button data-toggle="modal" data-target="#companytdelete{{ $data->id }}"class="btn btn-danger mt-2 btn-sm"><i class="fa fa-trash"></i></button>
                            </th>
                        </tr>
						<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="companytdelete{{ $data->id }}" role="dialog" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Congratulations Message </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Are You Wont To Delete This Company;
                    <div class="modal-footer">
                      <a href="{{route('company_info_delete',$data->id)}}" class="btn btn-danger mt-2 btn-sm">Delete</a>
                    </div>

                  </div>

                </div>
              </div>
            </div>
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
