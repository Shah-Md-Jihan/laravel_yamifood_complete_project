<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Carbon\Carbon;
use App\Models\ImageGallery;
use App\Models\GalleryHeadings;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  // method addgallery start
  function addgallery(){
    $title = "Add Gallery";
    return view('dashboard.add_gallery',compact('title'));
  }
  // method addgallery end

  // method addgallerypost start
  function addgallerypost(Request $request){
    $request->validate([
      'gallery_image' => 'required|image',
    ]);
    $gallery_image = $request->file('gallery_image');
    $gallery_id = ImageGallery::insertGetId([
      'gallery_image' => 'default.jpg',
      'created_at' => Carbon::now(),
    ]);
    $gllery_image_name_making = $gallery_id.'.'.$gallery_image->getClientOriginalExtension();
    $gallery_image_uploaded_location = base_path('public/uploads/gallery/'.$gllery_image_name_making);
    Image::make($gallery_image)->resize(1200, 800)->save($gallery_image_uploaded_location);

    // gallery image name update in db start
    ImageGallery::find($gallery_id)->update([
      'gallery_image' => $gllery_image_name_making
    ]);
    // gallery image name update in db end

    return back()->with('galery_image_upload_alert', 'Gallery image uploaded successfully!');
  }
  // method addgallerypost end

  // method listgallery start
  function listgallery(){
    $title = "List Gallery";
    return view('dashboard.list_gallery',compact('title'),[
      'gallery_images' => ImageGallery::latest()->paginate(10),
    ]);
  }
  // method listgallery end

  // method galleryimageupdate start
  function galleryimageupdate($gallery_id){
    $title = "Gallery Update";
    $gallery_infos = ImageGallery::find($gallery_id);
    return view('dashboard.gallery_image_update',compact('gallery_infos','title'));
  }
  // method galleryimageupdate end

  // method updategallerypost start
  function updategallerypost(Request $request){
    $request->validate([
      'gallery_image' => 'required|image',
    ]);
    $new_gallery_image = $request->file('gallery_image');
    $deleted_gallery_image_location = base_path('public/uploads/gallery/'.ImageGallery::find($request->gallery_id)->gallery_image);
    unlink($deleted_gallery_image_location);
    $gallery_image_new_name = $request->gallery_id.'.'.$new_gallery_image->getClientOriginalExtension();
    $new_upload_location = base_path('public/uploads/gallery/'.$gallery_image_new_name);
    Image::make($new_gallery_image)->resize(1200, 800)->save($new_upload_location);

    // gallery image name update in db start
    ImageGallery::find($request->gallery_id)->update([
      'gallery_image' => $gallery_image_new_name
    ]);
    // gallery image name update in db end
    return redirect('list/gallery')->with('gallery_image_update_alert', 'One gallery image updated successfully!');
  }
  // method updategallerypost end

  // method galleryimagedelete start
  function galleryimagedelete($gallery_id){
    $deleted_gallery_image_location = base_path('public/uploads/gallery/'.ImageGallery::find($gallery_id)->gallery_image);
    unlink($deleted_gallery_image_location);

    ImageGallery::find($gallery_id)->delete();
    return back()->with('gallery_image_delete_alert', 'One gallery image deleted!');
  }
  // method galleryimagedelete end

  // method addgalleryheadings start
  function addgalleryheadings(){
    $title = "Add Gallery Headings";
    return view('dashboard.add_gallery_headings', compact('title'));
  }
  // method addgalleryheadings end

  // method addgalleryheadingspost start
  function addgalleryheadingspost(Request $request){
    $request->validate([
      'gallery_headings' => 'required'
    ]);
    if (Str::wordCount($request->gallery_headings) > 30){
      return back()->with('largest_heading_err', 'Pleae write your headings within 30 words!')->withInput();
    }
    else{
      GalleryHeadings::insert([
        'gallery_headings' => $request->gallery_headings,
        'created_at' => Carbon::now(),
      ]);
      return redirect('gallery/headings/list')->with('add_gallery_headings_alert', 'One gallery headings added successfully!');
    }
  }
  // method addgalleryheadingspost end

  // method galleryheadinglist start
  function galleryheadinglist(){
    $title = "Gallery Headings List";
    return view('dashboard.gallery_heading_list',compact('title'), [
      'gallery_headings' => GalleryHeadings::latest()->get()
    ]);
  }
  // method galleryheadinglist end

  // method galleryheadingupdate start
  function galleryheadingupdate($heading_id){
    $title = "Gallery Headings Update";
    $gl_heading_infos = GalleryHeadings::find($heading_id);
    return view('dashboard.gallery_heading_update', compact('gl_heading_infos', 'tilte'));
  }
  // method galleryheadingupdate end

  // method galleryheadingupdatepost start
  function galleryheadingupdatepost(Request $request){
    $request->validate([
      'gallery_headings' => 'required'
    ]);
    if(Str::wordCount($request->gallery_headings) > 30){
      return back()->with('large_heading_err', 'Please write your heading within 30 words!')->withInput();
    }
    else{
      GalleryHeadings::find($request->heading_id)->update([
        'gallery_headings' => $request->gallery_headings,
      ]);
      return redirect('gallery/headings/list')->with('gallery_heading_update_alert', 'Gallery heading has been updated!');
    }
  }
  // method galleryheadingupdatepost end

  // method galleryheadingdelete start
  function galleryheadingdelete($heading_id){
    GalleryHeadings::find($heading_id)->delete();
    return back()->with('gallery_heading_delete_alert','One gallery headings has been deleted!');
  }
  // method galleryheadingdelete end

}
