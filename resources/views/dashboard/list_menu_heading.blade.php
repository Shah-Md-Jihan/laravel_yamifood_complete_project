@extends('layouts.dashboard_master')
@section('menu_headings')
  active
@endsection
@section('listmenuheadings')
  active
@endsection
@section('backend_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="pd-30">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Menu Headings</li>
          </ol>
        </nav>

        <div class="row">
          <div class="col-12 m-auto">
              {{-- add_category_heading_alert start --}}
              @if(session('add_category_heading_alert'))
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                  </symbol>
                </svg>
                <div class="alert alert-success d-flex align-items-center" role="alert">
                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                  <div>
                    <strong>{{ session('add_category_heading_alert') }}</strong>
                  </div>
                </div>
              @endif
              {{-- add_category_heading_alert end --}}

              {{-- delete_category_heading_alert start --}}
              @if(session('delete_category_heading_alert'))
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                  </symbol>
                </svg>
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                  <div>
                    <strong>{{ session('delete_category_heading_alert') }}</strong>
                  </div>
                </div>
              @endif
              {{-- delete_category_heading_alert end --}}

            <div class="card">
              <div class="card-header bg-purple text-white">
                <strong>List Menu Heading</strong>
              </div>
              <div class="card-body">
                <table  class="table">
                  <thead>
                    <tr>
                      <th>sl</th>
                      <th>menu headings</th>
                      <th>uploaded time</th>
                      <th>action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $sl_no = 1;
                    @endphp
                    @forelse ($menu_category_headings as $menu_category_heading)
                      <tr>
                        <td>{{ $sl_no++ }}</td>
                        <td>{{ $menu_category_heading->menu_headings }}</td>
                        <td>{{ $menu_category_heading->created_at->diffForHumans() }}</td>
                        <td>
                          <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ url('update/menu/heading') }}/{{ $menu_category_heading->id }}" type="button" class="btn btn-warning">Edit</a>
                            <a href="{{ url('menu/heading/delete') }}/{{ $menu_category_heading->id }}" type="button" class="btn btn-danger">Delete</a>
                          </div>
                        </td>
                      </tr>
                    @empty
                      <tr>
                        <td colspan="50">
                          <div class="alert alert-danger">
                            <span class="text-danger">
                              <center>No Data To Show</center>
                            </span>
                          </div>
                        </td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div><!-- d-flex -->

      <div class="br-pagebody mg-t-5 pd-x-30">

      </div><!-- br-pagebody -->

@endsection
