@extends('layouts.dashboard_master')
@section('slider')
  active
@endsection
@section('backend_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="pd-30">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update Slider</li>
          </ol>
        </nav>

        <div class="row">
          <div class="col-8 m-auto">
            <div class="card">
              <div class="card-header text-white" style="background:#6610f2">
                <strong>Update Slider</strong>
              </div>
              <div class="card-body">
                <form action="{{ url('slider/update/post') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-3">
                    <label class="form-label">Add Slider Description</label>
                    <textarea name="slider_description" rows="4" class="form-control">{{ $slider_info->slider_description }}</textarea>
                    <input type="hidden" name="slider_id" value="{{ $slider_info->id }}">
                    @error ('slider_description')
                      <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                    @if (session('big_description_alert'))
                      <strong class="text-danger">{{ session('big_description_alert') }}</strong>
                    @endif
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Current Slider Image</label><br>
                    <img src="{{ asset('uploads/slider') }}/{{ $slider_info->slider_image }}" alt="not found" width="200">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Add New Slider Image</label>
                    <input type="file" name="slider_image" class="form-control">
                    @error ('slider_image')
                      <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>

                  <button type="submit" style="cursor: pointer" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div><!-- d-flex -->

      <div class="br-pagebody mg-t-5 pd-x-30">

      </div><!-- br-pagebody -->

@endsection
