@extends('layouts.dashboard_master')
@section('menu')
  active
@endsection
@section('listmenudeleted')
  active
@endsection
@section('backend_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="pd-30">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/add/menu') }}">Add Menu</a></li>
            <li class="breadcrumb-item active" aria-current="page">Menu Product List</li>
          </ol>
        </nav>

        <div class="row">
          <div class="col-12 m-auto">

              {{-- menu_product_restore_alert start --}}
              @if(session('menu_product_restore_alert'))
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                  </symbol>
                </svg>
                <div class="alert alert-success d-flex align-items-center" role="alert">
                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                  <div>
                    <strong>{{ session('menu_product_restore_alert') }}</strong>
                  </div>
                </div>
              @endif
              {{-- menu_product_restore_alert end --}}
              {{-- product_hd_alert start --}}
              @if(session('product_hd_alert'))
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                  </symbol>
                </svg>
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                  <div>
                    <strong>{{ session('product_hd_alert') }}</strong>
                  </div>
                </div>
              @endif
              {{-- product_hd_alert end --}}

            <div class="card">
              <div class="card-header bg-secondary text-white">
                <strong>Menu Product List (Deleted)</strong>
              </div>
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th>SL.</th>
                      <th>Name of Menu</th>
                      <th>Details</th>
                      <th>Price</th>
                      <th>Category</th>
                      <th>Thumbnail</th>
                      <th>Deleted</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($deleted_menus as $menu)
                      <tr>
                        <td>{{ $deleted_menus->firstItem() + $loop->index }}</td>
                        <td>{{ $menu->menu_name }}</td>
                        <td>{{ $menu->menu_details }}</td>
                        <td>{{ $menu->menu_price }} Tk</td>
                        <td>{{ $menu->RelationWithMenuCategories->menu_category_name }}</td>
                        <td>
                          <img src="{{ asset('uploads/menus') }}/{{ $menu->menu_thumbnail }}" alt="not found" width="100">
                        </td>
                        <td>{{ $menu->deleted_at->diffForHumans() }}</td>
                        <td>
                          <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ url('menu/product/restore') }}/{{ $menu->id }}" type="button" class="btn btn-sm btn-success">Restore</a>
                            <a href="{{ url('menu/product/hard/delete') }}/{{ $menu->id }}" type="button" class="btn btn-sm btn-danger">H-Delete</a>
                          </div>
                        </td>
                      </tr>
                    @empty
                      <tr>
                        <td colspan="50">
                          <div class="alert alert-danger">
                            <strong>No data to show</strong>
                          </div>
                        </td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>
                {{ $deleted_menus->links() }}
              </div>
            </div>
          </div>
        </div>
      </div><!-- d-flex -->

      <div class="br-pagebody mg-t-5 pd-x-30">

      </div><!-- br-pagebody -->

@endsection
