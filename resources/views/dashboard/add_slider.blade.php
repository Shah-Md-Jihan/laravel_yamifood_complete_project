@extends('layouts.dashboard_master')
@section('slider')
  active
@endsection
@section('addslider')
  active
@endsection
@section('backend_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="pd-30">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Slider</li>
          </ol>
        </nav>

        <div class="row">
          <div class="col-8 m-auto">
            @if (session('SLIDER_ADD_ALERT'))
              {{-- slider upload alert start --}}
              <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </symbol>
              </svg>
              <div class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                <div>
                  <strong>{{ session('SLIDER_ADD_ALERT') }}</strong>
                </div>
              </div>
              {{-- slider upload alert end --}}
            @endif
            <div class="card">
              <div class="card-header text-white" style="background:#6610f2">
                <strong>Add Slider</strong>
              </div>
              <div class="card-body">
                <form action="{{ url('add/slider/post') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-3">
                    <label class="form-label">Add Slider Description</label>
                    <textarea name="slider_description" rows="4" class="form-control">{{ old('slider_description') }}</textarea>
                    @error ('slider_description')
                      <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                    @if (session('big_description_alert'))
                      <strong class="text-danger">{{ session('big_description_alert') }}</strong>
                    @endif
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Add Slider Image</label>
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
