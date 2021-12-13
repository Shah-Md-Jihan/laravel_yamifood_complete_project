<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuCategory;
use App\Models\MenuProduct;
use Carbon\Carbon;
use Image;

class MenuProductController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  // method addmenu start
  function addmenu(){
    $title = "Add Menu Product";
    return view('dashboard.add_menu',compact('title'), [
      'menu_categories' => MenuCategory::all()
    ]);
  }
  // method addmenu end

  // method addmenupost start
  function addmenupost(Request $request){
    $request->validate([
      'menu_name' => 'required|unique:menu_products|max:50',
      'menu_details' => 'required|max:60',
      'menu_price' => 'required|numeric',
      'menu_category_id' => 'required',
      'menu_thumbnail' => 'required|image',
    ]);
    $product_id = MenuProduct::insertGetId([
      'menu_name' => $request->menu_name,
      'menu_details' => $request->menu_details,
      'menu_price' => $request->menu_price,
      'menu_category_id' => $request->menu_category_id,
      'menu_thumbnail' => 'default.jpg',
      'created_at' => Carbon::now(),
    ]);
    // product menu image upload start
    $product_menu_image = $request->file('menu_thumbnail');
    $product_menu_img_name = $product_id.'.'.$product_menu_image->getClientOriginalExtension();
    $product_img_upload_location = base_path('public/uploads/menus/'.$product_menu_img_name);
    Image::make($product_menu_image)->resize(800, 480)->save($product_img_upload_location);
    // product menu image upload end
    // product menu name update start
    MenuProduct::find($product_id)->update([
      'menu_thumbnail' => $product_menu_img_name,
    ]);
    // product menu name update end
    return back()->with('product_menu_upload_alert', 'One menu item uploaded successfully!');
  }
  // method addmenupost end

  // method menuproductlist start
  function menuproductlist(){
    $title = "Menu Product List";

    return view('dashboard.menu_product_list',compact('title'),[
    'menu_products' => MenuProduct::latest()->paginate(3)
    ]);
  }
  // method menuproductlist end

  // method menuproductupdate start
  function menuproductupdate($menu_id){
    $title = "Update Menu Product";
    $product_infos = MenuProduct::find($menu_id);

    return view('dashboard.update_menu_product',compact('title','product_infos'),[
      'menu_categories' => MenuCategory::all()
    ]);
  }
  // method menuproductupdate end

  // method menuproductupdatepost start
  function menuproductupdatepost(Request $request){
    $menu_id = $request->menu_id;
    $request->validate([
      'menu_name' => 'required|max:50',
      'menu_details' => 'required|max:60',
      'menu_price' => 'required|numeric',
      'menu_thumbnail' => 'image',
    ]);
    if($request->hasFile('menu_thumbnail')){
      $current_image_location = base_path('public/uploads/menus/'.MenuProduct::find($request->menu_id)->menu_thumbnail);
      unlink($current_image_location);
      $new_thumbnail = $request->file('menu_thumbnail');
      $thumbnail_new_name = $menu_id.'.'.$new_thumbnail->getClientOriginalExtension();
      $new_upload_location = base_path('public/uploads/menus/'.$thumbnail_new_name);
      Image::make($new_thumbnail)->resize(800, 480)->save($new_upload_location);

      // db update
      MenuProduct::find($menu_id)->update([
        'menu_name' => $request->menu_name,
        'menu_details' => $request->menu_details,
        'menu_price' => $request->menu_price,
        'menu_category_id' => $request->menu_category_id,
        'menu_thumbnail' => $thumbnail_new_name,
      ]);
      return back()->with('menu_update_alert', 'Menu information updated successfully!');
    }
    else{
      // db update
      MenuProduct::find($menu_id)->update([
        'menu_name' => $request->menu_name,
        'menu_details' => $request->menu_details,
        'menu_price' => $request->menu_price,
        'menu_category_id' => $request->menu_category_id,
      ]);
      return back()->with('menu_update_alert', 'Menu information updated successfully!');
    }
  }
  // method menuproductupdatepost end

  // method menuproductdelete start
  function menuproductdelete($menu_id){
    MenuProduct::find($menu_id)->delete();
    return back()->with('menu_product_delete_alert', 'Menu product deleted successfully!');
  }
  // method menuproductdelete end

  // method menuproductlistdeleted start
  function menuproductlistdeleted(){
    $title = "List Menu Deleted";
    return view('dashboard.list_menu_deleted',compact('title'),[
      'deleted_menus' => MenuProduct::onlyTrashed()->paginate(3),
    ]);
  }
  // method menuproductlistdeleted end

  // method menuproductrestore start
  function menuproductrestore($menu_id){
    MenuProduct::onlyTrashed()->find($menu_id)->restore();
    return back()->with('menu_product_restore_alert', 'One menu item restore successfully!');
  }
  // method menuproductrestore end

  // method menuproducthd start
  function menuproducthd($menu_id){
    $deletedaaa_product_image_location = base_path('public/uploads/menus/'.MenuProduct::onlyTrashed()->find($menu_id)->menu_thumbnail);
    unlink($deletedaaa_product_image_location);
    MenuProduct::onlyTrashed()->find($menu_id)->forceDelete();
    return back()->with('product_hd_alert','Your menu product permanently deleted!');
  }
  // method menuproducthd end

}
