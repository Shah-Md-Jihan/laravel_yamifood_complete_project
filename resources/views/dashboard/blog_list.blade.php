@extends('layouts.dashboard_master')
@section('blog')
  active
@endsection
@section('listblog')
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
              {{-- blog_info_delete_alert start --}}
              @if (session('blog_info_delete_alert'))
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                  </symbol>
                </svg>
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                  <div>
                    <strong>{{ session('blog_info_delete_alert') }}</strong>
                  </div>
                </div>
              @endif
              {{-- sblog_info_delete_alert end --}}

            <div class="card">
              <div class="card-header text-white" style="background:darkorange">
                <strong>Blog List:</strong>
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>sl no</th>
                      <th>blog title</th>
                      <th>admin name</th>
                      <th>blog</th>
                      <th>uploaded</th>
                      <th>blog image</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($blogs as $blog)
                      <tr>
                        <td>1</td>
                        <td>{{ $blog->blog_title }}</td>
                        <td>{{ $blog->admin_name }}</td>
                        <td>{{ Str::limit($blog->blog_description, 20) }}</td>
                        <td>{{ $blog->created_at->diffForHumans() }}</td>
                        <td>
                          <img src="{{ asset('uploads/blogs') }}/{{ $blog->blog_image }}" alt="" width="100">
                        </td>
                        <td>
                          <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ url('/blog/edit') }}/{{ $blog->id }}" type="button" class="btn btn-info btn-sm">Edit</a>
                            <a href="{{ url('/blog/delete') }}/{{ $blog->id }}" type="button" class="btn btn-danger btn-sm">Delete</a>
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
                {{ $blogs->links() }}
              </div>
            </div>
          </div>
        </div>
      </div><!-- d-flex -->

      <div class="br-pagebody mg-t-5 pd-x-30">

      </div><!-- br-pagebody -->

@endsection
