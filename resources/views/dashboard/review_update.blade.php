@extends('layouts.dashboard_master')
@section('review')
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
            <li class="breadcrumb-item active" aria-current="page">Review Update</li>
          </ol>
        </nav>

        <div class="row">
          <div class="col-8 m-auto">

              {{-- update_review_alert start --}}
              @if(session('update_review_alert'))
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                  </symbol>
                </svg>
                <div class="alert alert-info d-flex align-items-center" role="alert">
                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                  <div>
                    <strong>{{ session('update_review_alert') }}</strong>
                  </div>
                </div>
              @endif
              {{-- update_review_alert end --}}

            <div class="card">
              <div class="card-header bg-info text-white">
                <strong>Review Content Update</strong>
              </div>
              <div class="card-body">
                <form action="{{ url('review/edit/post') }}" method="post" enctype="multipart/form-data">
                  @csrf
                    <div class="mb-3">
                      <label class="form-label">Review Author Name</label>
                      <input name="review_author_name" class="form-control" value="{{ $review_info->review_author_name }}">
                      <input type="hidden" name="review_id" value="{{ $review_info->id }}">
                      @error ('review_author_name')
                        <strong class="text-danger">{{ $message }}</strong>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Review Author Position</label>
                      <input name="author_position" class="form-control" value="{{ $review_info->author_position }}">
                      @error ('author_position')
                        <strong class="text-danger">{{ $message }}</strong>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Review</label>
                      <textarea name="review" rows="4" class="form-control">{{ $review_info->review }}</textarea>
                      @error ('review')
                        <strong class="text-danger">{{ $message }}</strong>
                      @enderror
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Current Review Author Image</label>
                      <img src="{{ asset('uploads/review') }}/{{ $review_info->author_image }}" alt="not found" width="80" height="100">
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Add About Image</label>
                      <input type="file" name="author_image" class="form-control">
                      @error ('author_image')
                        <strong class="text-danger">{{ $message }}</strong>
                      @enderror
                    </div>

                  <button type="submit" style="cursor: pointer" class="btn btn-success btn-sm">Update</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div><!-- d-flex -->

      <div class="br-pagebody mg-t-5 pd-x-30">

      </div><!-- br-pagebody -->

@endsection
