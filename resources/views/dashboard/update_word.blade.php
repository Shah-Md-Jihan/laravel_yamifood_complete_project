@extends('layouts.dashboard_master')
@section('words')
  active
@endsection
@section('listwords')
  active
@endsection
@section('backend_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="pd-30">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ url('list/words') }}">Word List</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update Word</li>
          </ol>
        </nav>

        <div class="row">
          <div class="col-8 m-auto">

            <div class="card">
              <div class="card-header bg-warning text-white">
                <strong>Update Word</strong>
              </div>
              <div class="card-body">
                <form action="{{ url('words/update/post') }}" method="post" enctype="multipart/form-data">
                    @csrf
                      <div class="mb-3">
                        <label class="form-label">Add Words</label>
                        <textarea name="words" rows="4" class="form-control">{{ $word_info->words }}</textarea>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Add Author Name</label>
                        <input type="text" name="author" class="form-control" value="{{ $word_info->author }}">
                        <input type="hidden" name="word_id" value="{{ $word_info->id }}">
                      </div>
                    <button type="submit" style="cursor: pointer" class="btn btn-success">Update</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div><!-- d-flex -->
      <div class="br-pagebody mg-t-5 pd-x-30">
    </div><!-- br-pagebody -->
@endsection
