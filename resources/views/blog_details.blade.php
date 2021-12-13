@extends('layouts.frontend_master')

@section('blog')
  active
@endsection
@section('frontend_content')
  <!-- Start blog details -->
<div class="blog-box">
  <div class="container">
    <div class="row">
      <div class="col-xl-8 col-lg-8 col-12 mt-5">
        <div class="blog-inner-details-page">
          <div class="blog-inner-box">
            <div class="side-blog-img">
              <img class="img-fluid" src="{{ asset('uploads/blogs') }}/{{ $blog_info->blog_image }}" alt="not found">
              <div class="date-blog-up">
                {{ $blog_info->created_at->format('d M') }}
              </div>
            </div>
            <div class="inner-blog-detail details-page">
              <h3>{{ $blog_info->blog_title }}</h3>
              <ul>
                <li><i class="zmdi zmdi-account"></i>Posted By : <span>{{ $blog_info->admin_name }}</span></li>
                <li>|</li>
                <li><i class="zmdi zmdi-time"></i>Time : <span>{{ $blog_info->created_at->diffForHumans() }}</span></li>
              </ul>

              <p>{{ $blog_info->blog_description }}</p>
            </div>
          </div>
          <div class="blog-comment-box">
            <h3>Comments</h3>
            @foreach ($blog_comments as $comment)
              <div class="comment-item">
              <div class="comment-item-left">
                <img src="{{ asset('uploads/avater/avater.png') }}" alt="" width="250">
              </div>
              <div class="comment-item-right">
                <div class="pull-left">
                  <a href="#">{{ $comment->visitor_email }}</a>
                </div>
                <div class="pull-right">
                  <i class="fa fa-clock-o" aria-hidden="true"></i>Time : <span>{{ $comment->created_at->diffForHumans() }}</span>
                </div>
                <div class="des-l">
                  <p>{{ $comment->comments }}</p>
                </div>
                <a href="{{ url('/blog/comment/reply') }}/{{ $comment->id }}" class="right-btn-re"><i class="fa fa-reply" aria-hidden="true"></i> Reply</a>
              </div>
            </div>
              @foreach (App\Models\BlogCommentReply::where('comment_id', $comment->id)->latest()->limit(1)->get() as $comment_reply)
              <div class="comment-item children">
                <div class="comment-item-left">
                  <img src="{{ asset('uploads/avater/avater.png') }}" alt="" width="250">
                </div>
                <div class="comment-item-right">
                  <div class="pull-left">
                    <a href="#">{{ $comment->visitor_email }}</a>
                  </div>
                  <div class="pull-right">
                    <i class="fa fa-clock-o" aria-hidden="true"></i>Time : <span>{{ $comment_reply->created_at->diffForHumans() }}</span>
                  </div>
                  <div class="des-l">
                    <p>{{ $comment_reply->blog_comment_reply }}</p>
                  </div>
                  <a href="#" class="right-btn-re"><i class="fa fa-reply" aria-hidden="true"></i> Reply</a>
                  <a href="{{ url('/blog/comment/reply/all/') }}/{{ $comment->id }}" class="right-btn-re"><i class="fa fa-reply-all"></i>Show All Replies</a>
                </div>
              </div>
              @endforeach
            @endforeach
          </div>
          <div class="comment-respond-box">
            <h3>Leave your comment</h3>
            @if (session('subscribe_alert'))
            <div class="alert alert-danger d-flex align-items-center" role="alert">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
              </svg>
              <div>
                <strong>{{ session('subscribe_alert') }}</strong>
              </div>
            </div>
            @endif
            <div class="comment-respond-form">
              <form action="/blog/comment/post" id="commentrespondform" class="comment-form-respond row" method="post">
                @csrf
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="form-group">
                    @foreach ($subscription_infos as $sub_info)
                      <input id="email_com" value="{{ $sub_info->user_email }}" class="form-control" name="visitor_email" placeholder="Your Email" type="hidden">
                      @error ('visitor_email')
                        <strong class="text-danger">{{ $message }}</strong>
                      @enderror
                    @endforeach
                  </div>
                  <div class="form-group">
                    <textarea name="comments" class="form-control" id="textarea_com" placeholder="Your Message" rows="2">{{ old('comments') }}</textarea>
                    <input type="hidden" name="blog_id" value="{{ $blog_info->id }}">
                    @error ('comments')
                      <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <button class="btn btn-submit">Submit comment</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-8 col-12 blog-sidebar">
        <div class="right-side-blog">
          <h3>Search</h3>
          <div class="blog-search-form">
            <input name="search" placeholder="Search blog" type="text">
            <button class="search-btn">
              <i class="fa fa-search" aria-hidden="true"></i>
            </button>
          </div>
          <h3>Categories</h3>
          <div class="blog-categories">
            <ul>
              @foreach ($menu_categories as $category)
                <li><a href="#"><span>{{ $category->menu_category_name }}</span></a></li>
              @endforeach
            </ul>
          </div>
          <h3>Recent Post</h3>
          <div class="post-box-blog">
            <div class="recent-post-box">
              @foreach ($blogs as $blog)
                <div class="recent-box-blog">
                <div class="recent-img">
                  <img class="img-fluid" src="{{ asset('uploads/blogs') }}/{{ $blog->blog_image }}" alt="not found" width="80">
                </div>
                <div class="recent-info">
                  <ul>
                    <li><i class="zmdi zmdi-account"></i>Posted By : <span>{{ $blog->admin_name }}</span></li>
                    <li>|</li>
                    <li><i class="zmdi zmdi-time"></i>Time : <span>{{ $blog->created_at->diffForHumans() }}</span></li>
                  </ul>
                  <h4>{{ $blog->blog_title }}</h4>
                </div>
              </div>
              @endforeach
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</div>
<!-- End details -->
@endsection
