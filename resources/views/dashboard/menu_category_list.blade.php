@extends('layouts.dashboard_master')
@section('menu_catgory')
  active
@endsection
@section('listmenucategory')
  active
@endsection
@section('backend_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="pd-30">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">List About Content</li>
          </ol>
        </nav>

        <div class="row">
          <div class="col-12 m-auto">

              {{-- category_deleted_alert start --}}
              @if (session('category_deleted_alert'))
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                  </symbol>
                </svg>
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                  <div>
                    <strong>{{ session('category_deleted_alert') }}</strong>
                  </div>
                </div>
              @endif
              {{-- category_deleted_alert end --}}
              {{-- category_restore_alert start --}}
              @if (session('category_restore_alert'))
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                  </symbol>
                </svg>
                <div class="alert alert-success d-flex align-items-center" role="alert">
                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                  <div>
                    <strong>{{ session('category_restore_alert') }}</strong>
                  </div>
                </div>
              @endif
              {{-- category_restore_alert end --}}
              {{-- category_hard_delete_alert start --}}
              @if (session('category_hard_delete_alert'))
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                  </symbol>
                </svg>
                <div class="alert alert-secondary d-flex align-items-center" role="alert">
                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                  <div>
                    <strong>{{ session('category_hard_delete_alert') }}</strong>
                  </div>
                </div>
              @endif
              {{-- category_hard_delete_alert end --}}

            <div class="card">
              <div class="card-header text-white" style="background:orange">
                <strong>Menu Category List</strong>
              </div>
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <td class="text-info"><strong>SL NO</strong></td>
                      <td class="text-info"><strong>Menu CATEGORY NAME</strong></td>
                      <td class="text-info"><strong>UPLOADED TIME</strong></td>
                      <td class="text-info"><strong>ACTION</strong></td>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $flag = 1;
                    @endphp
                    @forelse ($menu_categories as $category)
                      <tr>
                        <td>{{ $flag++ }}</td>
                        <td>{{ $category->menu_category_name }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>
                          <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ url('menu/category/update') }}/{{ $category->id }}" type="button" class="btn btn-info">Edit</a>
                            <a href="{{ url('menu/category/delete') }}/{{ $category->id }}" type="button" class="btn btn-danger">Delete</a>
                          </div>
                        </td>
                      </tr>
                    @empty
                      <tr>
                        <td colspan='50'>
                          <div class="alert alert-danger">
                            <span>No data to show</span>
                          </div>
                        </td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>

            <div class="card">
              <div class="card-header bg-danger text-white">
                <strong>Deleted Menu Category List</strong>
              </div>
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <td class="text-info"><strong>SL NO</strong></td>
                      <td class="text-info"><strong>CATEGORY NAME</strong></td>
                      <td class="text-info"><strong>DELETED TIME</strong></td>
                      <td class="text-info"><strong>ACTION</strong></td>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $flag = 1;
                    @endphp
                    @forelse ($deleted_menu_categories as $del_category)
                      <tr>
                        <td>{{ $flag++ }}</td>
                        <td>{{ $del_category->menu_category_name }}</td>
                        <td>{{ $del_category->deleted_at->diffForHumans() }}</td>
                        <td>
                          <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ url('menu/category/restore') }}/{{ $del_category->id }}" type="button" class="btn btn-success">Restore</a>
                            <a href="{{ url('menu/category/hard/delete') }}/{{ $del_category->id }}" type="button" class="btn btn-secondary">H-Delete</a>
                          </div>
                        </td>
                      </tr>
                    @empty
                      <tr>
                        <td colspan='50'>
                          <div class="alert alert-danger">
                            <span>No data to show</span>
                          </div>
                        </td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div><!-- d-flex -->

      <div class="br-pagebody mg-t-5 pd-x-30">

      </div><!-- br-pagebody -->

@endsection
