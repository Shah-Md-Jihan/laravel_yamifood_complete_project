<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use App\Models\About;
use Carbon\Carbon;

class AboutController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  
  function addaboutcontent(){
    $title = "Add About Content";
    return view('dashboard.add_about_content', compact('title'));
  }
  function addaboutcontentpost(Request $request){

    // form validation start
    $request->validate([
      'story' => 'required',
      'long_story' => 'required',
      'about_image' => 'required|image',
    ]);
    // form validation end
    // about conent upload start
    $about_id = About::insertGetId([
      'story' => $request->story,
      'long_story' => $request->long_story,
      'about_image' => 'default.jpg',
      'created_at' => Carbon::now(),
    ]);
    // about content upload end
    // about image upload start
    $about_image = $request->file('about_image');
    $about_image_new_name = $about_id.".".$about_image->getClientOriginalExtension();
    $about_image_upload_location = base_path('public/uploads/About_Image/'.$about_image_new_name);
    Image::make($about_image)->resize(800, 600)->save($about_image_upload_location);
    // about image upload end
    // about image name update in db end
    About::find($about_id)->update([
      'about_image' => $about_image_new_name,
    ]);
    // about image name update in db end

    // about content upload success alert start
    return back()->with('ABOUT_CONTENT_UPLOADT_ALERT', 'About content uploaded successfully!');
    // about content upload success alert end
  }
  function addaboutcontentlist(){
    $title = "About Content List";
    return view('dashboard.list_about_content',compact('title'),[
      'about_content' => About::latest()->get(),
      'about_content_deleted' => About::onlyTrashed()->latest()->get(),
    ]);
  }

  function aboutcontentlistupdate($about_id){
    $title = "About Content Update";
    $about_content = About::find($about_id);
    return view('dashboard.about_content_update', compact('about_content','title'));
  }

  function aboutcontentupdatepost(Request $request){
    $request->validate([
      'story' => 'required',
      'long_story' => 'required',
      'about_image' => 'image',
    ]);

    if ($request->hasFile('about_image')) {
      $current_image_location = base_path('public/uploads/About_Image/'.About::find($request->about_id)->about_image);
      unlink($current_image_location);
      $about_img = $request->file('about_image');
      $about_image_new_name = $request->about_id.'.'.$about_img->getClientOriginalExtension();
      $updated_image_location = base_path('public/uploads/About_Image/'.$about_image_new_name);
      Image::make($about_img)->resize(800, 600)->save($updated_image_location);

      About::find($request->about_id)->update([
        'story' => $request->story,
        'long_story' => $request->long_story,
        'about_image' => $about_image_new_name,
      ]);
    }
    else{
      About::find($request->about_id)->update([
        'story' => $request->story,
        'long_story' => $request->long_story,
      ]);
    }
    return redirect('add/about/content/list')->with('UPDATE_ABOUT_ALERT', 'One about item updated successfully');
  }
  // method aboutcontentupdatepost end

  // method aboutcontentdelete start
  function aboutcontentdelete($about_id){
    About::find($about_id)->delete();
    return back()->with('ABOUT_CONTENT_SOFT_DELETE_ALERT', 'One about item deleted!');
  }
  // method aboutcontentdelete end

  // method aboutcontentrestore start
  function aboutcontentrestore($about_id){
    About::onlyTrashed()->find($about_id)->restore();
    return back()->with('RESTORE_ABOUT_CONTENT', 'One category item restored!');
  }
  // method aboutcontentrestore end

  // method aboutcontentforcedelete start
  function aboutcontentforcedelete($about_id){
    $del_about_image = About::onlyTrashed()->find($about_id);
    $updated_image_location = base_path('public/uploads/About_Image/'.$del_about_image->about_image);
    unlink($updated_image_location);
    About::onlyTrashed()->find($about_id)->forceDelete();
    return back()->with('ABOUT_FORCE_DELETE_ALERT', 'One about item permanently deleted!');
  }
  // method aboutcontentforcedelete end

}
