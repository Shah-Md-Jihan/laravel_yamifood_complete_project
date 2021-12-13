@extends('layouts.dashboard_master')
@section('stuff')
  active
@endsection
@section('backend_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="pd-30">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ url('stuff/list') }}">Stuff List</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update Stuff</li>
          </ol>
        </nav>

        <div class="row">
          <div class="col-8 m-auto">
              {{-- stuff_info_update_alert alert start --}}
              @if (session('stuff_info_update_alert'))
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                  </symbol>
                </svg>
                <div class="alert alert-info d-flex align-items-center" role="alert">
                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                  <div>
                    <strong>{{ session('stuff_info_update_alert') }}</strong>
                  </div>
                </div>
              @endif
              {{-- stuff_info_update_alert alert end --}}

            <div class="card">
              <div class="card-header text-white" style="background: teal">
                <strong>Update Stuff Information</strong>
              </div>
              <div class="card-body">
                <form action="{{ url('stuff/edit/post') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-3">
                    <label class="form-label">Add Name Of Stuff</label>
                    <input type="text" value="@if(old('name_of_stuff')){{ old('name_of_stuff') }} @else {{ $stuff_info->name_of_stuff }} @endif" name="name_of_stuff" class="form-control">
                      <input type="hidden" name="stuff_id" value="{{ $stuff_info->id }}">
                    @error ('name_of_stuff')
                      <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Add Position of Stuff</label>
                    <input type="text" value="@if(old('position_of_stuff')){{ old('position_of_stuff') }} @else {{ $stuff_info->position_of_stuff }} @endif" name="position_of_stuff" class="form-control">
                    @error ('position_of_stuff')
                      <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Add Facebook Link of Stuff</label>
                    <input type="text" value="@if(old('stuff_fb_link')){{ old('stuff_fb_link') }} @else {{ $stuff_info->stuff_fb_link }} @endif" name="stuff_fb_link" class="form-control">
                    @error ('stuff_fb_link')
                      <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Add Twitter Link of Stuff</label>
                    <input type="text" value="@if(old('stuff_twitter_link')){{ old('stuff_twitter_link') }} @else {{ $stuff_info->stuff_twitter_link }} @endif" name="stuff_twitter_link" class="form-control">
                    @error ('stuff_twitter_link')
                      <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Add Google Link of Stuff</label>
                    <input type="text" value="@if(old('stuff_google_plus_link')){{ old('stuff_google_plus_link') }} @else {{ $stuff_info->stuff_google_plus_link }} @endif" name="stuff_google_plus_link" class="form-control">
                    @error ('stuff_google_plus_link')
                      <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Current Stuff Image</label>
                    <img src="{{ asset('uploads/stuff') }}/{{ $stuff_info->stuff_image }}" alt="Not found" width="100">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Add Stuff Image</label>
                    <input type="file" name="stuff_image" class="form-control">
                    @error ('stuff_image')
                      <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>

                  <button type="submit" class="btn btn-sm text-white" style="background: teal; cursor: pointer;">Update</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div><!-- d-flex -->

      <div class="br-pagebody mg-t-5 pd-x-30">

      </div><!-- br-pagebody -->

@endsection
