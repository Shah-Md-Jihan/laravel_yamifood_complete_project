@extends('layouts.dashboard_master')
@section('words')
  active
@endsection
@section('addwords')
  active
@endsection
@section('backend_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="pd-30">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Words</li>
          </ol>
        </nav>

        <div class="row">
          <div class="col-8 m-auto">

              {{-- add words alert start --}}
              @if(session('add_word_alert'))
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                  </symbol>
                </svg>
                <div class="alert alert-success d-flex align-items-center" role="alert">
                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                  <div>
                    <strong>{{ session('add_word_alert') }}</strong>
                  </div>
                </div>
              @endif
              {{-- menu words alert end --}}

            <div class="card">
              <div class="card-header bg-purple text-white">
                <strong>Add Words</strong>
              </div>
              <div class="card-body">
                <form action="{{ url('add/words/post') }}" method="post" enctype="multipart/form-data">
                  @csrf

                    <div class="mb-3">
                      <label class="form-label">Add Words</label>
                      <textarea name="words" rows="4" class="form-control" placeholder="Write your words!">{{ old('words') }}</textarea>
                      @if (session('big_content_alert'))
                        <strong class="text-danger">{{ session('big_content_alert') }}</strong>
                      @endif
                    </div>
                    @error ('words')
                      <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                    <div class="mb-3">
                      <label class="form-label">Add Author Name</label>
                      <input type="text" name="author" class="form-control" value="{{ old('author') }}" placeholder="Write author name!">
                      @error ('author')
                        <strong class="text-danger">{{ $message }}</strong>
                      @enderror
                    </div>

                  <button type="submit" style="cursor: pointer" class="btn btn-success">Upload</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div><!-- d-flex -->

      <div class="br-pagebody mg-t-5 pd-x-30">

      </div><!-- br-pagebody -->

@endsection
