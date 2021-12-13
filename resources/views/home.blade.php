@extends('layouts.dashboard_master')
@section('dashboard')
  active
@endsection
@section('backend_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="pd-30">
        <h4 class="tx-gray-800 mg-b-5">Dashboard</h4>
        <p class="mg-b-0">Welcome, {{ Auth::user()->name }}</p>
        <small>Email Address: {{ Auth::user()->email }}</small>
      </div><!-- d-flex -->

      <div class="br-pagebody mg-t-5 pd-x-30">
        <div class="row">
          <div class="col-10 m-auto">
            <div class="card">
              <div class="card-header bg-info text-white">
                Admin List
              </div>
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <td>
                        <strong>SL NO</strong>
                      </td>
                      <td>
                        <strong>ADMIN NAME</strong>
                      </td>
                      <td>
                        <strong>ADMIN EMAIL</strong>
                      </td>
                      <td>
                        <strong>STATUS</strong>
                      </td>
                      <td>
                        <strong>JOIN AS AN ADMIN</strong>
                      </td>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $flag = 1;
                    @endphp
                    @foreach ($admins as $admin)
                      <tr>
                        <td>{{ $flag++ }}</td>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td><span class="badge bg-success">Active</span></td>
                        <td>{{ $admin->created_at }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div><!-- br-pagebody -->

@endsection
