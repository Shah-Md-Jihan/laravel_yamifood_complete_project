<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Auth;
use Carbon\Carbon;
use Image;

class BlogController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  function addblog(){
    $title = "Add Blog";
    return view('dashboard.add_blog',compact('title'));
  }

  // method addblogpost star
  function addblogpost(Request $request){
    $request->validate([
      'blog_title' => 'required',
      'blog_description' => 'required',
      'blog_image' => 'required|image',
    ]);
    // blog insert in db start
    $blog_id = Blog::insertGetId([
      'blog_title' => $request->blog_title,
      'blog_description' => $request->blog_description,
      'admin_name' => Auth::user()->name,
      'blog_image' => 'default.jpg',
      'created_at' => Carbon::now(),
    ]);
    // blog insert in db end
    // blog image upload start
    $blog_image = $request->file('blog_image');
    $blog_image_name = $blog_id.'.'.$blog_image->getClientOriginalExtension();
    $blog_image_upload_location = base_path('public/uploads/blogs/'.$blog_image_name);
    Image::make($blog_image)->resize(900, 500)->save($blog_image_upload_location);
    // blog image upload end
    // blog image name update in db start
    Blog::find($blog_id)->update([
      'blog_image' => $blog_image_name,
    ]);
    // blog image name update in db end
    return back()->with('add_blog_alert', 'One blog item added successfully!');
  }
  // method addblogpost end

  // method bloglist start
  function bloglist(){
    $title = "Blog List";
    return view('dashboard.blog_list',compact('title'),[
      'blogs' => Blog::latest()->paginate(1),
    ]);
  }
  // method bloglist end

  // method blogedit start
  function blogedit($blog_id){
    $blog_info = Blog::find($blog_id);
    $title = "Blog Edit";
    return view('dashboard.blog_edit',compact('blog_info','title'));
  }
  // method blogedit end

  // method blogedit start
  function blogeditpost(Request $request){
    $request->validate([
      'blog_title' => 'required',
      'blog_description' => 'required',
    ]);
    if($request->hasFile('blog_image')){
      $request->validate([
        'blog_image' => 'image'
      ]);
      $current_image_location = base_path('public/uploads/blogs/'.Blog::find($request->blog_id)->blog_image);
      unlink($current_image_location);
      $blog_img = $request->file('blog_image');
      $blog_image_new_name = $request->blog_id.'.'.$blog_img->getClientOriginalExtension();
      $updated_image_location = base_path('public/uploads/blogs/'.$blog_image_new_name);
      Image::make($blog_img)->resize(900, 500)->save($updated_image_location);

      Blog::find($request->blog_id)->update([
        'blog_title' => $request->blog_title,
        'admin_name' => Auth::user()->name,
        'blog_description' => $request->blog_description,
        'blog_image' => $blog_image_new_name,
      ]);
      return back()->with('blog_info_update_alert', 'Blog Information updated successfully!');
    }else{
      Blog::find($request->blog_id)->update([
        'blog_title' => $request->blog_title,
        'admin_name' => Auth::user()->name,
        'blog_description' => $request->blog_description,
      ]);
      return back()->with('blog_info_update_alert', 'Blog Information updated successfully!');
    }
  }
  // method blogedit end

  // method blogdelete start
  function blogdelete($blog_id){
    $current_image_location = base_path('public/uploads/blogs/'.Blog::find($blog_id)->blog_image);
    unlink($current_image_location);
    Blog::find($blog_id)->delete();
    return back()->with('blog_info_delete_alert', 'Blog Information deleted!');
  }
  // method blogdelete end
}
