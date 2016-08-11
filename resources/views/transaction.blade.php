@extends('layouts.master1')
@include('includes.header1')
@section('content')
<!-- Sidebar -->
<!-- Page Content -->

  <div class="panel panel-primary col-md-12 panel2">
    <div class="panel-heading">
      <h3 style="color:white" class="panel-title">Add Transaction</h3>
    </div>
    <div class="panel-body">
      <div class="col-md-6">
        @include('includes.messageblock')
        <form action="{{ route('transaction')}}" method="post">
          <div class="form-group">
            <label for="site_name">Site Name</label>
            <input class="form-control" type="text" name="site_name"></div>
            <div class="form-group">
              <label for="client_name">Client Name</label>
              <input class="form-control" type="text" name="client_name"  value=""></div>
              <div class="form-group">
                <label for="event">Event</label>
                <select type="text" name="event" class="form-control" id="event">
                  <option>open</option>
                  <option>occupied</option>
                  <option>closed</option>
                </select>
              </div>
              <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="text" id="start_date" name="start_date" class="form-control"></div>
                <div class="form-group">
                  <label for="duration">Duration</label>
                  <input class="form-control" type="text" name="duration"></div>
                  <div class="form-group">
                    <label for="comment">Comment:</label>
                    <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
                  </div>
                  <button type="submit" class="btn btn-success">Save</button>
                  <input type="hidden" name="_token" value="{{ Session::token() }}"></form>
                </div>
              </div>
                @include('includes.messageblock')
                <div class="panel panel-primary col-md-12">
                  <div class="panel-heading">
                    <h3 style="color:white" class="panel-title">Current Transactions</h3>
                  </div>
                  <div class="panel-body">
                    <div class="col-md-">
                      <table id="myTable" class="table table-striped table-bordered dataTable">
                        <thead>
                          <th>ID</th>
                          <th>Site Name</th>
                          <th>Cient Name</th>
                          <th>Event</th>
                          <th>Start Date</th>
                          <th>Duration</th>
                          <th>Comment</th>
                          
                        </thead>
                        <tbody>
                          @foreach($transactions as $transaction)
                          <tr class="mark">
                            <td>{{ $transaction->id }}</td>
                            <td>{{ $transaction->site_name }}</td>
                            <td>{{ $transaction->client_name }}</td>
                            <td>{{ $transaction->event }}</td>
                            <td>{{ $transaction->start_date }}</td>
                            <td>{{ $transaction->duration }}</td>
                            <td>{{ $transaction->comment }}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                  @endsection
                 
                  
                             