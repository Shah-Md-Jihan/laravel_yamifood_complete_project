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
            <li class="breadcrumb-item"><a href="{{ url('list/review') }}">List Review</a></li>
            <li class="breadcrumb-item active" aria-current="page">Review Details</li>
          </ol>
        </nav>

        <div class="row">
          <div class="col-8 m-auto">
            <div class="card">
              <div class="card-header text-white" style="background:teal">
                <strong>About Content List</strong>
              </div>
              <div class="card-body">
                <strong>Written Time: </strong><span>{{ $review_details->created_at->format('d M Y | h:i:s A') }}</span>
                <br>
                <strong>Author: </strong><span>{{ $review_details->review_author_name }}</span>
                <br>
                <strong>Author Position: </strong><span>{{ $review_details->author_position }}</span>
                <div class="author_image mt-4 mb-3">
                  <center><img src="{{ asset('uploads/review') }}/{{ $review_details->author_image }}" alt="" width="100"></center>
                </div>
                <p>{{ $review_details->review }}</p>
              </div>
            </div>
          </div>
        </div>
      </div><!-- d-flex -->

      <div class="br-pagebody mg-t-5 pd-x-30">

      </div><!-- br-pagebody -->
@endsection
