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
          @foreach ($all_replies as $reply)
            <div class="comment-item children">
              <div class="comment-item-left">
                <img src="{{ asset('uploads/avater/avater.png') }}" alt="" width="250">
              </div>
              <div class="comment-item-right">
                <div class="pull-left">
                  <a href="#">{{ App\Models\BlogComment::find($reply->comment_id)->visitor_email }}</a>
                </div>
                <div class="pull-right">
                  <i class="fa fa-clock-o" aria-hidden="true"></i>Time : <span>{{ $reply->created_at->diffForHumans() }}</span>
                </div>
                <div class="des-l">
                  <p>{{ $reply->blog_comment_reply }}</p>
                </div>
                
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <!-- End blog -->
@endsection
