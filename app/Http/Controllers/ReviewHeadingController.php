<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReviewHeading;
use Carbon\Carbon;

class ReviewHeadingController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  // method addreviewheading start
  function addreviewheading(){
    $title = "Add Review Heading";
    return view('dashboard.add_review_heading', compact('title'));
  }
  // method addreviewheading end

  // method addreviewheadingpost start
  function addreviewheadingpost(Request $request){
    $request->validate([
      'review_headings' => 'required|max:300'
    ]);

    ReviewHeading::insert([
      'review_headings' => $request->review_headings,
      'created_at' => Carbon::now(),
    ]);
    return back()->with('add_review_heading_alert', 'Review heading added successfully');
  }
  // method addreviewheadingpost end

  // method listreviewheading start
  function listreviewheading(){
    $title = "List Review Heading";
    return view('dashboard.list_review_heading', compact('title'),[
      'review_headings' => ReviewHeading::latest()->paginate(1)
    ]);
  }
  // method listreviewheading end

  // method editreviewheading start
  function editreviewheading($review_heading_id){
    $title = "Update Review Heading";
    $rv_heading_info = ReviewHeading::find($review_heading_id);
    return view('dashboard.update_review_heading', compact('title','rv_heading_info'));
  }
  // method editreviewheading end

  // method editreviewheadingpost start
  function editreviewheadingpost(Request $request){
    $request->validate([
      'review_headings' => 'required|max:300'
    ]);
    ReviewHeading::find($request->rv_heading_id)->update([
      'review_headings' => $request->review_headings
    ]);
    return back()->with('rv_heading_update_alert', 'Review heading updated successfully!');
  }
  // method editreviewheadingpost end

  // method reviewheadingdelete start
  function reviewheadingdelete($review_heading_id){
    ReviewHeading::find($review_heading_id)->delete();
    return back()->with('review_heading_delete_alert','One review heading deleted!');
  }
  // method reviewheadingdelete end
}
