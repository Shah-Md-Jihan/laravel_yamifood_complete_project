@extends('layouts.dashboard_master')
@section('stuff')
  active
@endsection
@section('liststaff')
  active
@endsection
@section('backend_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="pd-30">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Stuff List</li>
          </ol>
        </nav>

        <div class="row">
          <div class="col-10 m-auto">

              {{-- stuff_info_add_alert alert start --}}
              @if (session('stuff_info_add_alert'))
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                  </symbol>
                </svg>
                <div class="alert alert-success d-flex align-items-center" role="alert">
                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                  <div>
                    <strong>{{ session('stuff_info_add_alert') }}</strong>
                  </div>
                </div>
              @endif
              {{-- stuff_info_add_alert alert end --}}
              {{-- stuff_info_delete_alert alert start --}}
              @if (session('stuff_info_delete_alert'))
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                  </symbol>
                </svg>
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                  <div>
                    <strong>{{ session('stuff_info_delete_alert') }}</strong>
                  </div>
                </div>
              @endif
              {{-- stuff_info_delete_alert alert end --}}

            <div class="card">
              <div class="card-header text-white" style="background:#b90b29">
                <strong>Stuff Information List :</strong>
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>sl no</th>
                      <th>name of stuff</th>
                      <th>position of stuff</th>
                      <th>stuff fb link</th>
                      <th>stuff twitter link</th>
                      <th>stuff google plus link</th>
                      <th>stuff image</th>
                      <th>uploaded</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($stuffs as $stuff)
                      <tr>
                        <td>{{ $stuffs->firstItem() + $loop->index }}</td>
                        <td>{{ $stuff->name_of_stuff }}</td>
                        <td>{{ $stuff->position_of_stuff }}</td>
                        <td>{{ $stuff->stuff_fb_link }}</td>
                        <td>{{ $stuff->stuff_twitter_link }}</td>
                        <td>{{ $stuff->stuff_google_plus_link }}</td>
                        <td>
                          <img src="{{ asset('uploads/stuff') }}/{{ $stuff->stuff_image }}" alt="not found" width="100">
                        </td>
                        <td>{{ $stuff->created_at->diffForHumans() }}</td>
                        <td>
                          <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ url('stuff/edit') }}/{{ $stuff->id }}" type="button" class="btn btn-info btn-sm">Edit</a>
                            <a href="{{ url('stuff/delete') }}/{{ $stuff->id }}" type="button" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </td>
                      </tr>
                    @empty
                      <tr>
                        <td colspan='50'>
                          <div class="alert alert-danger">
                            <strong>No data to show</strong>
                          </div>
                        </td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>
                {{ $stuffs->links() }}
              </div>
            </div>
          </div>
        </div>
      </div><!-- d-flex -->

      <div class="br-pagebody mg-t-5 pd-x-30">

      </div><!-- br-pagebody -->

@endsection
