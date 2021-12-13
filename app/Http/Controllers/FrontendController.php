<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\About;
use App\Models\Word;
use App\Models\MenuCategory;
use App\Models\MenuProduct;
use App\Models\MenuCategoryHeadings;
use App\Models\Subsciption;
use App\Models\ImageGallery;
use App\Models\GalleryHeadings;
use App\Models\CustomerReview;
use App\Models\Reservation;
use App\Models\Stuff;
use App\Models\ReviewHeading;
use App\Models\Blog;
use App\Models\BlogComment;
use App\Models\BlogCommentReply;
use App\Models\ContactMessage;
use Carbon\Carbon;
use Illuminate\Support\Str;

class FrontendController extends Controller
{
  public function index(){
    $title = "Home";
    $menu_category_headings = MenuCategoryHeadings::latest()->limit(1)->get();
    $ip_address = request()->ip();
    $subscription_infos = Subsciption::where('ip_address',$ip_address)->get();
    return view('index', compact('menu_category_headings','subscription_infos','title'),[
      'sliders' => Slider::all(),
      'about_contents' => About::latest()->limit(1)->get(),
      'words' => Word::latest()->limit(1)->get(),
      'menu_categories' => MenuCategory::all(),
      'menu_products' => MenuProduct::latest()->limit(12)->get(),
      'gallery_images' => ImageGallery::latest()->limit(12)->get(),
      'gallery_headings' => GalleryHeadings::latest()->limit(1)->get(),
      'customer_reviews' => CustomerReview::all(),
      'review_headings' => ReviewHeading::latest()->limit(1)->get(),
    ]);
  }

  function menu(){
    $title = "Menu";
    $ip_address = request()->ip();
    $subscription_infos = Subsciption::where('ip_address',$ip_address)->get();
    $menu_category_headings = MenuCategoryHeadings::latest()->limit(1)->get();
    return view('menu',compact('menu_category_headings','subscription_infos','title'),[
      'menu_categories' => MenuCategory::all(),
      'menu_products' => MenuProduct::latest()->limit(12)->get(),
      'words' => Word::latest()->limit(1)->get(),
    ]);
  }

  // method about start
  function about(){
    $title = "About";
    $ip_address = request()->ip();
    $subscription_infos = Subsciption::where('ip_address',$ip_address)->get();
    $menu_category_headings = MenuCategoryHeadings::latest()->limit(1)->get();
    return view('about', compact('subscription_infos','menu_category_headings','title'),[
      'menu_categories' => MenuCategory::all(),
      'menu_products' => MenuProduct::latest()->limit(12)->get(),
      'about_contents' => About::latest()->limit(1)->get(),
    ]);
  }
  // method about end

  // method reservation start
  function reservation(){
    $title = "Reservation";
    $ip_address = request()->ip();
    $subscription_infos = Subsciption::where('ip_address',$ip_address)->get();

    return view('reservation', compact('subscription_infos','title'));
  }
  // method reservation end

  // method reservationpost start
  function reservationpost(Request $request){
    $request->validate([
      'date' => 'required',
      'time' => 'required',
      'person' => 'required|numeric',
      'reservation_author_name' => 'required',
      'reservation_author_email' => 'required|email',
      'reservation_author_phone' => 'required|numeric',
    ]);

    Reservation::insert([
      'date' => $request->date,
      'time' => $request->time,
      'person' => $request->person,
      'reservation_author_name' => $request->reservation_author_name,
      'reservation_author_email' => $request->reservation_author_email,
      'reservation_author_phone' => $request->reservation_author_phone,
      'created_at' => Carbon::now(),
    ]);
    return back()->with('reservation_alert', 'We received your reservation!');
  }

  // method stuff start
  function stuff(){
    $title = "Stuff";
    $ip_address = request()->ip();
    $subscription_infos = Subsciption::where('ip_address',$ip_address)->get();
    return view('stuff', compact('subscription_infos','title'),[
      'customer_reviews' => CustomerReview::all(),
      'stuffs' => Stuff::latest()->get(),
      'review_headings' => ReviewHeading::latest()->limit(1)->get(),
    ]);
  }
  // method stuff end

  // method gallery start
  function gallery(){
    $title = "Gallery";
    $ip_address = request()->ip();
    $subscription_infos = Subsciption::where('ip_address',$ip_address)->get();
    return view('gallery', compact('title','subscription_infos'), [
      'galleries' => ImageGallery::latest()->get()
    ]);
  }
  // method gallery end

  // method blog start
  function blog(){
    $title = "Blog Page";
    $ip_address = request()->ip();
    $subscription_infos = Subsciption::where('ip_address',$ip_address)->get();
    return view('blog', compact('title','subscription_infos'),[
      'blogs' => Blog::latest()->get()
    ]);
  }
  // method blog end

  // method blogdetails start
  function blogdetails($blog_id){
    $title = "Blog Details";
    $ip_address = request()->ip();
    $subscription_infos = Subsciption::where('ip_address',$ip_address)->get();
    $blog_info = Blog::find($blog_id);
    return view('blog_details',compact('title','subscription_infos','blog_info'),[
      'menu_categories' => MenuCategory::latest()->get(),
      'blogs' => Blog::latest()->limit(4)->get(),
      'blog_comments' => BlogComment::where('blog_id', $blog_id)->latest()->get(),
    ]);
  }
  // method blogdetails end

  // method blogcomment start
  function blogcomment(Request $request){
    $request->validate([
      'visitor_email' => 'required|email',
      'comments' => 'required',
    ]);
    $ip_address = request()->ip();
    $subscription_infos = Subsciption::where('ip_address',$ip_address)->get();
    if(count($subscription_infos) < 1){
      return back()->with('subscribe_alert', 'Please subscribe us and than leave a comment')->withInput();
    }else{
      BlogComment::insert([
        'visitor_email' => $request->visitor_email,
        'blog_id' => $request->blog_id,
        'comments' => $request->comments,
        'created_at' => Carbon::now(),
      ]);
      return back();
    }
  }
  // method blogcomment end

  // method blogcommentreply start
  function blogcommentreply($comment_id){
    $title = "Blog Comment Reply";
    $ip_address = request()->ip();
    $subscription_infos = Subsciption::where('ip_address',$ip_address)->get();
    return view('blog_comment_reply', compact('title','subscription_infos','comment_id'));
  }
  // method blogcommentreply end

  // method blogcommentreplypost start
  function blogcommentreplypost(Request $request){
    $request->validate([
      'blog_comment_reply' => 'required'
    ]);
    BlogCommentReply::insert([
      'comment_id' => $request->comment_id,
      'blog_comment_reply' => $request->blog_comment_reply,
      'created_at' => Carbon::now(),
    ]);
    return redirect('/blog/details/'.BlogComment::find($request->comment_id)->blog_id);
  }
  // method blogcommentreplypost end

  // method blogcommentreplyall start
  function blogcommentreplyall($comment_id){
    $title = "All Comment Reply";
    $ip_address = request()->ip();
    $subscription_infos = Subsciption::where('ip_address',$ip_address)->get();
    return view('view_all_comment_reply', compact('title','subscription_infos'),[
      'all_replies' => BlogCommentReply::where('comment_id',$comment_id)->get()
    ]);
  }
  // method blogcommentreplyall end

  // mehtod contact start
  function contact(){
    $title = "Contact Page";
    $ip_address = request()->ip();
    $subscription_infos = Subsciption::where('ip_address',$ip_address)->get();
    return view('contact', compact('title','subscription_infos'));
  }
  // mehtod contact end

  // method contactpost start
  function contactpost(Request $request){
    $request->validate([
      'name' => 'required',
      'email' => 'required|email',
      'message' => 'required',
    ]);
    ContactMessage::insert([
      'name' => Str::title($request->name),
      'email' =>  Str::lower($request->email),
      'message' => $request->message,
      'created_at' => Carbon::now(),
    ]);
    return back()->with('contact_message_sent_alert','We received your message!');
  }
  // method contactpost end

}
