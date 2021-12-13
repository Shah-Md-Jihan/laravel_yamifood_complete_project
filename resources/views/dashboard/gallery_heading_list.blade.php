@extends('layouts.dashboard_master')
@section('gallery')
  active
@endsection
@section('listgalleryheadings')
  active
@endsection
@section('backend_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="pd-30">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Words</li>
          </ol>
        </nav>

        <div class="row">
          <div class="col-11 m-auto">

              {{-- add_gallery_headings_alert start --}}
              @if(session('add_gallery_headings_alert'))
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                  </symbol>
                </svg>
                <div class="alert alert-success d-flex align-items-center" role="alert">
                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                  <div>
                    <strong>{{ session('add_gallery_headings_alert') }}</strong>
                  </div>
                </div>
              @endif
              {{-- add_gallery_headings_alert end --}}

              {{-- gallery_heading_update_alert start --}}
              @if(session('gallery_heading_update_alert'))
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                  </symbol>
                </svg>
                <div class="alert alert-info d-flex align-items-center" role="alert">
                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                  <div>
                    <strong>{{ session('gallery_heading_update_alert') }}</strong>
                  </div>
                </div>
              @endif
              {{-- gallery_heading_update_alert end --}}

              {{-- gallery_heading_delete_alert start --}}
              @if(session('gallery_heading_delete_alert'))
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                  </symbol>
                </svg>
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                  <div>
                    <strong>{{ session('gallery_heading_delete_alert') }}</strong>
                  </div>
                </div>
              @endif
              {{-- gallery_heading_delete_alert end --}}

            <div class="card">
              <div class="card-header bg-purple text-white">
                <strong>Gallery Heading List</strong>
              </div>
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">sl</th>
                      <th scope="col">gallery headings</th>
                      <th scope="col">uploaded time</th>
                      <th scope="col">action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $sl_no = 1;
                    @endphp
                    @forelse ($gallery_headings as $gallery_heading)
                      <tr>
                        <td>{{ $sl_no++ }}</td>
                        <td>{{ $gallery_heading->gallery_headings }}</td>
                        <td>{{ $gallery_heading->created_at->diffForHumans() }}</td>
                        <td>
                          <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ url('gallery/heading/update') }}/{{ $gallery_heading->id }}" type="button" class="btn btn-warning">Edit</a>
                            <a href="{{ url('gallery/heading/delete') }}/{{ $gallery_heading->id }}" type="button" class="btn btn-danger">Delete</a>
                          </div>
                        </td>
                      </tr>
                    @empty
                      <tr>
                        <td colspan="50">
                          <div class="alert alert-danger text-center">
                            <strong>No data to show</strong>
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
