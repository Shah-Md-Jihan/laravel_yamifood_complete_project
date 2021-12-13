<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerReview;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Image;

class ReviewController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  // method addreview start
  function addreview(){
    $title = "Add Review";
    return view('dashboard.add_review',compact('title'));
  }
  // method addreview end

  // method addreviewpost start
  function addreviewpost(Request $request){
    $request->validate([
      'review_author_name' => 'required',
      'author_position' => 'required',
      'review' => 'required',
      'author_image' => 'required|image',
    ]);
    if(Str::wordCount($request->review) > 50){
      return back()->with('large_review_err', 'Please write review within 50 words')->withInput();
    }else{
      $review_id = CustomerReview::insertGetId([
        'review_author_name' => $request->review_author_name,
        'author_position' => $request->author_position,
        'review' => $request->review,
        'author_image' => 'default.jpg',
        'created_at' => Carbon::now(),
      ]);

      // author image upload start
      $review_image = $request->file('author_image');
      $review_image_new_name = $review_id.'.'.$review_image->getClientOriginalExtension();
      $review_image_location = base_path('public/uploads/review/'.$review_image_new_name);
      Image::make($review_image)->resize(600, 600)->save($review_image_location);
      // author image upload end

      // author image name updade in db start
      CustomerReview::find($review_id)->update([
        'author_image' => $review_image_new_name
      ]);
      // author image name updade in db end
      return back()->with('add_review_alert', 'One review item added successfully!');
    }
  }
  // method addreviewpost end

  // method listreview start
  function listreview(){
    $title = "List Review";
    return view('dashboard.list_review', compact('title'),[
      'customer_reviews' => CustomerReview::latest()->paginate(5)
    ]);
  }
  // method listreview end

  // method reviewdetails start
  function reviewdetails($review_id){
    $title = "Review Details";
    $review_details = CustomerReview::find($review_id);
    return view('dashboard.review_details', compact('title','review_details'));
  }
  // method reviewdetails end

  // method reviewedit start
  function reviewedit($review_id){
    $title = "Review Update";
    $review_info = CustomerReview::find($review_id);
    return view('dashboard.review_update',compact('title','review_info'));
  }
  // method reviewedit end

  // method revieweditpost start
  function revieweditpost(Request $request){
    $request->validate([
      'review_author_name' => 'required',
      'author_position' => 'required',
      'review' => 'required',
    ]);
    if(Str::wordCount($request->review) > 50){
      return back()->with('large_review_err', 'Please write review within 50 words')->withInput();
    }
    else if($request->hasFile('author_image')){
      $request->validate([
        'author_image' => 'image',
      ]);
      $current_review_image_location = base_path('public/uploads/review/'.CustomerReview::find($request->review_id)->author_image);
      unlink($current_review_image_location);
      $review_img = $request->file('author_image');
      $review_img_new_name = $request->review_id.'.'.$review_img->getClientOriginalExtension();
      $updated_review_image_location = base_path('public/uploads/review/'.$review_img_new_name);
      Image::make($review_img)->resize(600, 600)->save($updated_review_image_location);

      // db update start
       CustomerReview::find($request->review_id)->update([
         'review_author_name' => $request->review_author_name,
         'author_position' => $request->author_position,
         'review' => $request->review,
         'author_image' => $review_img_new_name,
       ]);
      // db update end
      return back()->with('update_review_alert', 'Review info updated successfully!');
    }
    else{
      // db update start without author_image field
      CustomerReview::find($request->review_id)->update([
        'review_author_name' => $request->review_author_name,
        'author_position' => $request->author_position,
        'review' => $request->review,
      ]);
      // db update end without author_image field
      return back()->with('update_review_alert', 'Review info updated successfully!');
    }
  }
  // method revieweditpost end

  // method reviewdelete start
  function reviewdelete($review_id){
    CustomerReview::find($review_id)->delete();
    return back()->with('review_delete_alert','One review item deleted!');
  }
  // method reviewdelete end

}
