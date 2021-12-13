@extends('layouts.dashboard_master')
@section('menu_catgory')
  active
@endsection
@section('backend_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="pd-30">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ url('menu/category/list') }}">List Menu Category</a></li>
            <li class="breadcrumb-item active" aria-current="page">Menu Category Update</li>
          </ol>
        </nav>

        <div class="row">
          <div class="col-8 m-auto">

              {{-- menu category update alert start --}}
              @if(session('update_menu_category_alert'))
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                  </symbol>
                </svg>
                <div class="alert alert-info d-flex align-items-center" role="alert">
                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                  <div>
                    <strong>{{ session('update_menu_category_alert') }}</strong>
                  </div>
                </div>
              @endif
              {{-- menu category update alert end --}}

            <div class="card">
              <div class="card-header bg-warning text-white">
                <strong>Menu Category Update</strong>
              </div>
              <div class="card-body">
                <form action="{{ url('menu/category/update/post') }}" method="post">
                  @csrf
                  <div class="form-group">
                    <label>Menu Category</label>
                    <input type="text" value="{{ $menu_cat_infos->menu_category_name }}" name="menu_category_name" class="form-control" placeholder="Enter category name!">
                    <input type="hidden" value="{{ $menu_cat_infos->id }}" name="menu_category_id" class="form-control" placeholder="Enter category name!">
                    @error ('menu_category_name')
                      <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>
                  <button type="submit" style="cursor: pointer;" class="btn btn-info">Update</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div><!-- d-flex -->

      <div class="br-pagebody mg-t-5 pd-x-30">

      </div><!-- br-pagebody -->

@endsection
