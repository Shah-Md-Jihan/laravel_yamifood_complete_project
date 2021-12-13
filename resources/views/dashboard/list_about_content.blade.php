@extends('layouts.dashboard_master')
@section('about')
  active
@endsection
@section('listaboutcontent')
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

              {{-- about content upload alert start --}}
              @if (session('ABOUT_CONTENT_UPLOADT_ALERT'))
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                  </symbol>
                </svg>
                <div class="alert alert-success d-flex align-items-center" role="alert">
                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                  <div>
                    <strong>{{ session('ABOUT_CONTENT_UPLOADT_ALERT') }}</strong>
                  </div>
                </div>
              @endif
              {{-- about content upload alert end --}}
              {{-- about content update alert start --}}
              @if (session('UPDATE_ABOUT_ALERT'))
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                  </symbol>
                </svg>
                <div class="alert alert-success d-flex align-items-center" role="alert">
                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                  <div>
                    <strong>{{ session('UPDATE_ABOUT_ALERT') }}</strong>
                  </div>
                </div>
              @endif
              {{-- about content update alert end --}}
              {{-- about content soft delete alert start --}}
              @if (session('ABOUT_CONTENT_SOFT_DELETE_ALERT'))
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                  </symbol>
                </svg>
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                  <div>
                    <strong>{{ session('ABOUT_CONTENT_SOFT_DELETE_ALERT') }}</strong>
                  </div>
                </div>
              @endif
              {{-- about content soft delete alert end --}}
              {{-- about content restore alert start --}}
              @if (session('RESTORE_ABOUT_CONTENT'))
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                  </symbol>
                </svg>
                <div class="alert alert-success d-flex align-items-center" role="alert">
                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                  <div>
                    <strong>{{ session('RESTORE_ABOUT_CONTENT') }}</strong>
                  </div>
                </div>
              @endif
              {{-- about content restore alert end --}}
              {{-- about content force delete alert start --}}
              @if (session('ABOUT_FORCE_DELETE_ALERT'))
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                  </symbol>
                </svg>
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                  <div>
                    <strong>{{ session('ABOUT_FORCE_DELETE_ALERT') }}</strong>
                  </div>
                </div>
              @endif
              {{-- about content force delete alert end --}}

            <div class="card">
              <div class="card-header text-white" style="background:orange">
                <strong>About Content List</strong>
              </div>
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <td class="text-info"><strong>SL NO</strong></td>
                      <td class="text-info"><strong>STORY</strong></td>
                      <td class="text-info"><strong>ABOUT IMAGE</strong></td>
                      <td class="text-info"><strong>UPLOADED TIME</strong></td>
                      <td class="text-info"><strong>ACTION</strong></td>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $flag = 1;
                    @endphp
                    @forelse ($about_content as $content)
                      <tr class="text-success">
                        <td>{{ $flag++ }}</td>
                        <td>{{ Str::limit($content->story, 200) }}<a href="#">More</a></td>
                        <td>
                          <img src="{{ asset('uploads/About_Image') }}/{{ $content->about_image }}" alt="not found" width="100px" height="110px">
                        </td>
                        <td>
                          {{ $content->created_at->format('d/M/Y h:i:s A') }}<br>
                          <strong class="text-warning">{{ $content->created_at->diffForHumans() }}</strong>
                        </td>
                        <td>
                          <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ url('list/about/content/update') }}/{{ $content->id }}" type="button" class="btn btn-warning">Edit</a>
                            <a href="{{ url('about/content/delete') }}/{{ $content->id }}" type="button" class="btn btn-danger">Delete</a>
                          </div>
                        </td>
                      </tr>
                    @empty
                      <tr>
                        <td colspan="50">
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

            {{-- delted about content table start --}}
            <div class="card mt-5">
              <div class="card-header bg-danger text-white">
                <strong>Deleted About Content List</strong>
              </div>
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <td class="text-danger"><strong>SL NO</strong></td>
                      <td class="text-danger"><strong>STORY</strong></td>
                      <td class="text-danger"><strong>ABOUT IMAGE</strong></td>
                      <td class="text-danger"><strong>DELETED TIME</strong></td>
                      <td class="text-danger"><strong>ACTION</strong></td>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $del_sl = 1;
                    @endphp
                    @forelse ($about_content_deleted as $del_content)
                      <tr class="text-danger">
                        <td>{{ $del_sl++ }}</td>
                        <td>{{ Str::limit($del_content->story, 200) }}<a href="#">More</a></td>
                        <td>
                          <img src="{{ asset('uploads/About_Image') }}/{{ $del_content->about_image }}" alt="not found" width="100px" height="110px">
                        </td>
                        <td>
                          {{ $del_content->deleted_at->diffForHumans() }}
                        <td>
                          <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ url('about/content/restore') }}/{{ $del_content->id }}" type="button" class="btn btn-success">Restore</a>
                            <a href="{{ url('about/content/force/delete') }}/{{ $del_content->id }}" type="button" class="btn btn-secondary">H-Delete</a>
                          </div>
                        </td>
                      </tr>
                    @empty
                      <tr>
                        <td colspan="50">
                          <div class="alert alert-danger">
                            <center><strong>No data to show</strong></center>
                          </div>
                        </td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
            {{-- delted about content table end --}}
          </div>
        </div>
      </div><!-- d-flex -->

      <div class="br-pagebody mg-t-5 pd-x-30">

      </div><!-- br-pagebody -->
@endsection
