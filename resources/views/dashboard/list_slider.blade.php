@extends('layouts.dashboard_master')
@section('slider')
  active
@endsection
@section('listslider')
  active
@endsection
@section('backend_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="pd-30">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">List Slider</li>
          </ol>
        </nav>

        <div class="row">
          <div class="col-12 m-auto">
            {{-- slider_update_alert start --}}
            @if (session('slider_update_alert'))
              <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </symbol>
              </svg>
              <div class="alert alert-info d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                <div>
                  <strong>{{ session('slider_update_alert') }}</strong>
                </div>
              </div>
            @endif
            {{-- slider_update_alert end --}}

            {{-- slider_delete_alert start --}}
            @if (session('slider_delete_alert'))
              <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </symbol>
              </svg>
              <div class="alert alert-secondary d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                <div>
                  <strong>{{ session('slider_delete_alert') }}</strong>
                </div>
              </div>
              {{-- slider_delete_alert end --}}
            @endif
            <div class="card">
              <div class="card-header text-white" style="background:#6610f2">
                <strong>List Slider</strong>
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>SL</th>
                      <th>slider description</th>
                      <th>slider image</th>
                      <th>uploaded at</th>
                      <th>action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($sliders as $slider)
                      <tr>
                        <td>1</td>
                        <td>{{ $slider->slider_description }}</td>
                        <td>
                          <img src="{{ asset('uploads/slider') }}/{{ $slider->slider_image }}" alt="not found" width="100">
                        </td>
                        <td>{{ $slider->created_at->diffForHumans() }}</td>
                        <td>
                          <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ url('slider/update') }}/{{ $slider->id }}" type="button" class="btn btn-warning">Edit</a>
                            <a href="{{ url('slider/delete') }}/{{ $slider->id }}" type="button" class="btn btn-secondary">Delete</a>
                          </div>
                        </td>
                      </tr>
                    @empty
                      <tr>
                        <td>
                          <div class="alert alert-danger">
                            <strong>No data to show</strong>
                          </div>
                        </td>
                      </tr>
                    @endforelse

                  </tbody>
                </table>
                {{ $sliders->links() }}
              </div>
            </div>
          </div>
        </div>
      </div><!-- d-flex -->

      <div class="br-pagebody mg-t-5 pd-x-30">

      </div><!-- br-pagebody -->

@endsection
