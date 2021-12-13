@extends('layouts.dashboard_master')
@section('menu_headings')
  active
@endsection

@section('backend_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="pd-30">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update Menu Headings</li>
          </ol>
        </nav>

        <div class="row">
          <div class="col-10 m-auto">
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
              {{-- update_category_heading_alert start --}}
              @if(session('update_category_heading_alert'))
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                  </symbol>
                </svg>
                <div class="alert alert-success d-flex align-items-center" role="alert">
                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                  <div>
                    <strong>{{ session('update_category_heading_alert') }}</strong>
                  </div>
                </div>
              @endif
              {{-- update_category_heading_alert end --}}

            <div class="card">
              <div class="card-header bg-warning text-white">
                <strong>Update Menu Heading</strong>
              </div>
              <div class="card-body">
                <form action="{{ url('update/menu/heading/post') }}" method="post">
                  @csrf
                  <div class="form-group">
                    <label>Menu Heading</label>
                    <textarea type="text" rows="2" name="menu_headings" class="form-control">{{ $menu_heading_info->menu_headings }}</textarea>
                    <input type="hidden" name="menu_heading_id" value="{{ $menu_heading_info->id }}">
                    @error ('menu_headings')
                      <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                    @if (session('big_headings_alert'))
                      <strong class="text-danger">{{ session('big_headings_alert') }}</strong>
                    @endif
                  </div>
                  <button type="submit" style="cursor:pointer;" class="btn btn-info">Update</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div><!-- d-flex -->

      <div class="br-pagebody mg-t-5 pd-x-30">

      </div><!-- br-pagebody -->

@endsection
