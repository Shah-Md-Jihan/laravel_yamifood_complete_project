@extends('layouts.frontend_master')

@section('blog')
  active
@endsection
@section('frontend_content')
  <!-- Start All Pages -->
  <div class="all-page-title page-breadcrumb">
    <div class="container text-center">
      <div class="row">
        <div class="col-lg-12">
          <h1>Blog</h1>
        </div>
      </div>
    </div>
  </div>
  <!-- End All Pages -->
  <!-- Start blog -->
  <div class="blog-box">
    <div class="container">
      <div class="row">
        <div class="col-8 m-auto">
          <form action="{{ url('/blog/comment/reply/post') }}" method="post">
            @csrf
            <div class="mb-3">
              <label>Comment</label>
              <span class="form-control">{{ App\Models\BlogComment::find($comment_id)->comments }}</span>
            </div>
            <div class="mb-3">
              <label>Leave Your Reply</label>
              <textarea name="blog_comment_reply" rows="4" class="form-control"></textarea>
              <input type="hidden" name="comment_id" value="{{ $comment_id }}">
              @error ('blog_comment_reply')
                <strong class="text-danger">{{ $message }}</strong>
              @enderror
            </div>
            <button type="submit" class="btn btn-info">Leave Reply</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- End blog -->
@endsection
