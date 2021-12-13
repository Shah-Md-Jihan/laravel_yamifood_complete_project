<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Carbon\Carbon;
use Image;
use Illuminate\Support\Str;

class SliderController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  function addslider(){
    $title = "Add Slider";
    return view('dashboard.add_slider',compact('title'));
  }
  function addsliderpost(Request $request){
    // add slider form validation start
    $request->validate([
      'slider_description' => 'required',
      'slider_image' => 'required|image',
    ]);
    if(Str::wordCount($request->slider_description) > 50){
      return back()->with('big_description_alert', 'Please write your description with in 50 words!')->withInput();
    }
    // add slider form validation end

    else{
      // slider info insert in db start
      $slider_id = Slider::insertGetId([
        'slider_description' => $request->slider_description,
        'slider_image' => 'default.jpg',
        'created_at' => Carbon::now()
      ]);
      // slider info insert in db end

        // image upload start
        $uploaded_image = $request->file('slider_image');
        $uploaded_image_name = $slider_id.'.'.$uploaded_image->getClientOriginalExtension();
        $image_upload_location = base_path('public/uploads/slider/'.$uploaded_image_name);
        Image::make($uploaded_image)->resize(1920, 1280)->save($image_upload_location);
        // image upload end

        // slider db update start
        Slider::find($slider_id)->update([
          'slider_image' => $uploaded_image_name,
        ]);
        // slider db update end
        return back()->with('SLIDER_ADD_ALERT', "Slider data uploaded successfully!");
    }

  }

  // method listslider start
  function listslider(){
    $title = "Slider List";
    return view('dashboard.list_slider', compact('title'),[
      'sliders' => Slider::latest()->paginate(1)
    ]);
  }
  // method listslider end

  // method sliderupdate start
  function sliderupdate($slider_id){
    $title = "Update Slider";
    $slider_info = Slider::find($slider_id);
    return view('dashboard.update_slider',compact('title','slider_info'));
  }
  // method sliderupdate end

  // method sliderupdatepost start
  function sliderupdatepost(Request $request){
    $request->validate([
      'slider_description' => 'required',
      'slider_image' => 'image',
    ]);
    if(Str::wordCount($request->slider_description) > 50){
      return back()->with('big_description_alert', 'Please write your description with in 50 words!');
    }
    else{
      if($request->hasFile('slider_image')){
        $slider_id = $request->slider_id;
        // old image delete start
        $current_image_location = base_path('public/uploads/slider/'.Slider::find($slider_id)->slider_image);
        unlink($current_image_location);
        // old image delete end

        // new image upload start
        $slider_img = $request->file('slider_image');
        $slider_img_new_name = $slider_id.'.'.$slider_img->getClientOriginalExtension();
        $new_upload_location = base_path('public/uploads/slider/'.$slider_img_new_name);
        Image::make($slider_img)->resize(1920, 1280)->save($new_upload_location);
        Slider::find($slider_id)->update([
          'slider_description' => $request->slider_description,
          'slider_image' => $slider_img_new_name,
        ]);
        // new image upload end
        return redirect('list/slider')->with('slider_update_alert', 'One slider item updated successfully!');
      }
      else{
        // slider description update start
        Slider::find($request->slider_id)->update([
          'slider_description' => $request->slider_description,
        ]);
        // slider description update end
        return redirect('list/slider')->with('slider_update_alert', 'One slider item updated successfully!');
      }
    }

  }
  // method sliderupdatepost end

  // method sliderdelete start
  function sliderdelete($slider_id){
    Slider::find($slider_id)->delete();
    return back()->with('slider_delete_alert','One slider item deleted successfully!');
  }
  // method sliderdelete end

  // method listsliderdeleted start
  function listsliderdeleted(){
    $title = "List Slider Deleted";
    return view('dashboard.list_slider_deleted',compact('title'),[
      'delslider' => Slider::onlyTrashed()->paginate(1)
    ]);
  }
  // method listsliderdeleted end

  // method sliderrestore start
  function sliderrestore($slider_id){
    Slider::onlyTrashed()->find($slider_id)->restore();
    return back()->with('slider_restore_alert', 'One slider item restored successfully!');
  }
  // method sliderrestore end

  // method sliderhddelete start
  function sliderhddelete($slider_id){
    $hddelete_image_location = base_path('public/uploads/slider/'.Slider::onlyTrashed()->find($slider_id)->slider_image);
    unlink($hddelete_image_location);
    Slider::onlyTrashed()->find($slider_id)->forceDelete();
    return back()->with('slider_hd_delete_alert','One slider item permanetly deleted!');
  }
  // method sliderhddelete end
}
