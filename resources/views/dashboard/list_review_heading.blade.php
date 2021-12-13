@extends('layouts.dashboard_master')
@section('review')
  active
@endsection
@section('listreview')
  active
@endsection
@section('backend_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="pd-30">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">List About Content</li>
          </ol>
        </nav>

        <div class="row">
          <div class="col-12 m-auto">

              {{-- review_heading_delete_alert start --}}
              @if (session('review_heading_delete_alert'))
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                  </symbol>
                </svg>
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                  <div>
                    <strong>{{ session('review_heading_delete_alert') }}</strong>
                  </div>
                </div>
              @endif
              {{-- review_heading_delete_alert end --}}
            <div class="card">
              <div class="card-header text-white" style="background: tomato;">
                <strong>About Content List</strong>
              </div>
              <div class="card-body">
                <table class="table table-borderd">
                  <thead>
                    <tr>
                      <th><strong>sl no</strong></th>
                      <th><strong>review headings</strong></th>
                      <th><strong>uploaded time</strong></th>
                      <th><strong>action</strong></th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($review_headings as $review_heading)
                      <tr>
                        <td>{{ $review_headings->firstItem() + $loop->index }}</td>
                        <td>{{ $review_heading->review_headings }}</td>
                        <td>
                          {{ $review_heading->created_at->format('d M Y') }}<br>
                          {{ $review_heading->created_at->format('h:i:s A') }}<br>
                          {{ $review_heading->created_at->diffForHumans() }}
                        </td>
                        <td>
                          <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ url('review/heading/edit') }}/{{ $review_heading->id }}" type="button" class="btn btn-info btn-sm">Edit</a>
                            <a href="{{ url('review/heading/delete') }}/{{ $review_heading->id }}" type="button" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </td>
                      </tr>
                    @empty
                      <tr>
                        <td colspan='50'>
                          <div class="alert alert-danger">
                            <strong>No data to show</strong>
                          </div>
                        </td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>
                {{ $review_headings->links() }}
              </div>
            </div>
          </div>
        </div>
      </div><!-- d-flex -->

      <div class="br-pagebody mg-t-5 pd-x-30">

      </div><!-- br-pagebody -->
@endsection
