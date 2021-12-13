<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Stuff;
use Carbon\Carbon;
use Image;

class StuffController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  // method addstuff start
  function addstuff(){
    $title = "Add Stuff";
    return view('dashboard.add_stuff',compact('title'));
  }
  // method addstuff end

  // method addstuffpost start
  function addstuffpost(Request $request){
    $request->validate([
      'name_of_stuff' => 'required',
      'position_of_stuff' => 'required',
      'stuff_fb_link' => 'required',
      'stuff_twitter_link' => 'required',
      'stuff_google_plus_link' => 'required',
      'stuff_image' => 'required|image',
    ]);
    $stuff_id = Stuff::insertGetId([
      'name_of_stuff' => Str::title($request->name_of_stuff),
      'position_of_stuff' => Str::title($request->position_of_stuff),
      'stuff_fb_link' => $request->stuff_fb_link,
      'stuff_twitter_link' => $request->stuff_twitter_link,
      'stuff_google_plus_link' => $request->stuff_google_plus_link,
      'stuff_image' => 'default.jpg',
      'created_at' => Carbon::now()
    ]);
    $stuff_image = $request->file('stuff_image');
    $stuff_image_name = $stuff_id.'.'.$stuff_image->getClientOriginalExtension();
    $stuff_image_location = base_path('public/uploads/stuff/'.$stuff_image_name);
    Image::make($stuff_image)->resize(400, 450)->save($stuff_image_location);

    Stuff::find($stuff_id)->update([
      'stuff_image' => $stuff_image_name
    ]);
    return back()->with('stuff_info_add_alert', 'Stuff infos added successfully!');
  }
  // method addstuffpost end

  // method stufflist start
  function stufflist(){
    $title = "Stuff List";
    return view('dashboard.list_stuff', compact('title'),[
      'stuffs' => Stuff::latest()->paginate(10)
    ]);
  }
  // method stufflist end

  // method stuffedit start
  function stuffedit($stuff_id){
    $stuff_info = Stuff::find($stuff_id);
    $title = "Stuff Update";
    return view('dashboard.stuff_edit',compact('title','stuff_info'));
  }
  // method stuffedit end

  // method stuffeditpost start
  function stuffeditpost(Request $request){
    $request->validate([
      'name_of_stuff' => 'required',
      'position_of_stuff' => 'required',
      'stuff_fb_link' => 'required',
      'stuff_twitter_link' => 'required',
      'stuff_google_plus_link' => 'required',
    ]);
    if($request->hasFile('stuff_image')){
      $request->validate([
        'stuff_image' => 'image'
      ]);
      $current_image_location = base_path('public/uploads/stuff/'.Stuff::find($request->stuff_id)->stuff_image);
      unlink($current_image_location);
      $stuff_img = $request->file('stuff_image');
      $stuff_image_new_name = $request->stuff_id.'.'.$stuff_img->getClientOriginalExtension();
      $updated_image_location = base_path('public/uploads/stuff/'.$stuff_image_new_name);
      Image::make($stuff_img)->resize(400, 450)->save($updated_image_location);

      Stuff::find($request->stuff_id)->update([
        'name_of_stuff' => $request->name_of_stuff,
        'position_of_stuff' => $request->position_of_stuff,
        'stuff_fb_link' => $request->stuff_fb_link,
        'stuff_twitter_link' => $request->stuff_twitter_link,
        'stuff_google_plus_link' => $request->stuff_google_plus_link,
        'stuff_image' => $stuff_image_new_name,
      ]);
      return back()->with('stuff_info_update_alert', 'Stuff Information updated successfully!');
    }else{
      Stuff::find($request->stuff_id)->update([
        'name_of_stuff' => $request->name_of_stuff,
        'position_of_stuff' => $request->position_of_stuff,
        'stuff_fb_link' => $request->stuff_fb_link,
        'stuff_twitter_link' => $request->stuff_twitter_link,
        'stuff_google_plus_link' => $request->stuff_google_plus_link,
      ]);
      return back()->with('stuff_info_update_alert', 'Stuff Information updated successfully!');
    }
  }
  // method stuffeditpost end

  // method stuffdelete start
  function stuffdelete($stuff_id){
    $current_image_location = base_path('public/uploads/stuff/'.Stuff::find($stuff_id)->stuff_image);
    unlink($current_image_location);
    Stuff::find($stuff_id)->delete();
    return back()->with('stuff_info_delete_alert', 'Stuff Information deleted!');
  }
  // method stuffdelete end
}
