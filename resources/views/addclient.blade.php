@extends('layouts.master1')
@include('includes.header1')
@section('content')

    <!-- /#sidebar-wrapper -->
    <div class="panel panel-primary col-md-12 panel2">
        <div class="panel-heading">
            <h3 style="color:white" class="panel-title">Add Client</h3>
        </div>
    
    <div class="panel-body">
        <div class="col-md-6">
            @include('includes.messageblock')
            <form action="{{ route('addclient') }}" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" type="text" name="client_name" id="client_name" value=""></div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="text" name="email" placeholder="Enter your Email" value="" id="email"></div>
                        <div class="form-group">
                            <label for="phone_no">Phone Number</label>
                            <input class="form-control" type="text" name="phone_no" id="phone_no" value=""></div>
                            <button type="submit" class="btn btn-success">Save</button>
                            <input type="hidden" name="_token" value="{{ Session::token() }}"></form>
                        </div>
                    </div>
                </div>

                        @include('includes.messageblock')
                        <div class="panel panel-primary col-md-12">
                            <div class="panel-heading">
                                <h3 style="color:white" class="panel-title">Added Clients</h3>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-">
                                    <table id="myTable" class="table table-striped table-bordered dataTable">
                                        <thead>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>update</th>
                                        </thead>
                                        <tbody>
                                            @foreach($clients as $client)
                                            <tr class="markk">
                                                <td>{{ $client->id }}</td>
                                                <td>{{ $client->client_name }}</td>
                                                <td>{{ $client->email }}</td>
                                                <td>{{ $client->phone_no }}</td>
                                                <td>
                                                    <!-- edit this site (uses the edit method found at GET /sites -->
                                                    <a  class="btn btn-warning update" href="#">UPDATE</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    
            <div class="modal fade" tabindex="-1" role="dialog" id="modal-edit">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Update Clients</h4>
                        </div>

                        <div class="modal-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="client_nameId">Client Name</label>
                                    <input class="form-control" type="text" name="client_nameId" value="" id="client_nameId">
                                </div>
                                
                                <div class="form-group">
                                    <label for="emailId">Email</label>
                                    <input class="form-control" type="text" name="emaiId" value="" id="emailId">
                                </div>

                                <div class="form-group">
                                    <label for="phone_noId">Phone Number</label>
                                    <input class="form-control" type="text" name="phone_noId" id="phone_noId" value="" >
                                </div>
                                 
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="save-modal">Save changes</button>
                        </div>
                        </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->

                       
                        <script>
                        var token = '{{ Session::token() }}';
                        var urlEdit = '{{ route('edit.client') }}';
                        </script>

                        @endsection