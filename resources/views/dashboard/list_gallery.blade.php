@extends('layouts.dashboard_master')
@section('gallery')
  active
@endsection
@section('listgallery')
  active
@endsection
@section('backend_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="pd-30">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Menu Headings</li>
          </ol>
        </nav>

        <div class="row">
          <div class="col-8 m-auto">

              {{-- gallery_image_update_alert start --}}
              @if(session('gallery_image_update_alert'))
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                  </symbol>
                </svg>
                <div class="alert alert-info d-flex align-items-center" role="alert">
                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                  <div>
                    <strong>{{ session('gallery_image_update_alert') }}</strong>
                  </div>
                </div>
              @endif
              {{-- gallery_image_update_alert end --}}

            <div class="card">
              <div class="card-header bg-purple text-white">
                <strong>Gallery Images List</strong>
              </div>
              <div class="card-body">
                <table  class="table">
                  <thead>
                    <tr>
                      <th>sl</th>
                      <th>gallery images</th>
                      <th>uploaded time</th>
                      <th>action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($gallery_images as $gal_image)
                      <tr>
                        <td>{{ $gallery_images->firstItem() + $loop->index }}</td>
                        <td>
                          <img src="{{ url('uploads/gallery') }}/{{ $gal_image->gallery_image }}" alt="not found" width="100" height="60">
                        </td>
                        <td>{{ $gal_image->created_at->diffForHumans() }}</td>
                        <td>
                          <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ url('gallery/image/update') }}/{{ $gal_image->id }}" type="button" class="btn btn-warning">Edit</a>
                            <a href="{{ url('gallery/image/delete') }}/{{ $gal_image->id }}" type="button" class="btn btn-danger">Delete</a>
                          </div>
                        </td>
                      </tr>
                    @empty
                      <tr>
                        <td colspan="50">
                          <span class="text-danger">
                            <center>No Data To Show</center>
                          </span>
                        </td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>
                {{ $gallery_images->links() }}
              </div>
            </div>
          </div>
        </div>
      </div><!-- d-flex -->

      <div class="br-pagebody mg-t-5 pd-x-30">

      </div><!-- br-pagebody -->

@endsection
