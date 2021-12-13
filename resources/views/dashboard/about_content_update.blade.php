@extends('layouts.dashboard_master')
@section('about')
  active
@endsection
@section('listaboutcontent')
  active
@endsection
@section('backend_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="pd-30">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ url('add/about/content/list') }}">List About Content</a></li>
            <li class="breadcrumb-item active" aria-current="page">About Content Update</li>
          </ol>
        </nav>

        <div class="row">
          <div class="col-8 m-auto">

              {{-- menu category upload alert start --}}
              @if(session('ADD_MENU_CATEGORY_ALERT'))
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                  </symbol>
                </svg>
                <div class="alert alert-success d-flex align-items-center" role="alert">
                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                  <div>
                    <strong>{{ session('ADD_MENU_CATEGORY_ALERT') }}</strong>
                  </div>
                </div>
              @endif
              {{-- menu category upload alert end --}}

            <div class="card">
              <div class="card-header bg-info text-white">
                <strong>About Content Update</strong>
              </div>
              <div class="card-body">
                <form action="{{ url('list/about/content/update/post') }}" method="post" enctype="multipart/form-data">
                  @csrf

                    <div class="mb-3">
                      <label class="form-label">Add About Content</label>
                      <input name="story" class="form-control" value="{{ $about_content->story }}">
                      <input type="hidden" name="about_id" value="{{ $about_content->id }}">
                      @error ('story')
                        <strong class="text-danger">{{ $message }}</strong>
                      @enderror
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Current About Image</label>
                      <img src="{{ asset('uploads/About_Image') }}/{{ $about_content->about_image }}" alt="not found" width="80" height="100">
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Add About Image</label>
                      <input type="file" name="about_image" class="form-control">
                      @error ('about_image')
                        <strong class="text-danger">{{ $message }}</strong>
                      @enderror
                    </div>

                  <button type="submit" style="cursor: pointer" class="btn btn-success">Upload</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div><!-- d-flex -->

      <div class="br-pagebody mg-t-5 pd-x-30">

      </div><!-- br-pagebody -->

@endsection
