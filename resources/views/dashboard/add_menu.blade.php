@extends('layouts.dashboard_master')
@section('menu')
  active
@endsection
@section('addmenu')
  active
@endsection
@section('backend_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="pd-30">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Menu Category</li>
          </ol>
        </nav>

        <div class="row">
          <div class="col-8 m-auto">

              {{-- menu menu upload alert start --}}
              @if(session('product_menu_upload_alert'))
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                  </symbol>
                </svg>
                <div class="alert alert-success d-flex align-items-center" role="alert">
                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                  <div>
                    <strong>{{ session('product_menu_upload_alert') }}</strong>
                  </div>
                </div>
              @endif
              {{-- menu menu upload alert end --}}

            <div class="card">
              <div class="card-header bg-purple text-white">
                <strong>Add Menu Item</strong>
              </div>
              <div class="card-body">
                <form action="{{ url('add/menu/post') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <label>Menu Name</label>
                    <input type="text" value="{{ old('menu_name') }}" name="menu_name" class="form-control" placeholder="Enter menu name!">
                    @error ('menu_name')
                      <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Menu Details</label>
                    <textarea name="menu_details" rows="4" class="form-control" placeholder="Write menu details!">{{ old('menu_details') }}</textarea>
                    @error ('menu_details')
                      <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Menu Category</label>
                    <select name="menu_category_id" class="form-control">
                      <option selected disabled>--select category--</option>
                      @foreach ($menu_categories as $menu_category)
                        <option value="{{ $menu_category->id }}">{{ $menu_category->menu_category_name }}</option>
                      @endforeach
                    </select>
                    @error ('menu_category_id')
                      <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Menu Price</label>
                    <input type="text" value="{{ old('menu_price') }}" name="menu_price" class="form-control" placeholder="Enter menu price!">
                    @error ('menu_price')
                      <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Menu Thumbnail</label>
                    <input type="file" name="menu_thumbnail" class="form-control">
                    @error ('menu_thumbnail')
                      <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>
                  <button type="submit" style="cursor: pointer;" class="btn btn-success btn-sm">Upload</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div><!-- d-flex -->

      <div class="br-pagebody mg-t-5 pd-x-30">

      </div><!-- br-pagebody -->

@endsection
