<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuCategory;
use App\Models\MenuProduct;
use Illuminate\Support\Str;
use Carbon\Carbon;

class MenuCategoryController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  function addmenucategory(){
    $title = "Add Menu Category";
    return view('dashboard.add_menu_category', compact('title'));
  }
  function addmenucategorypost(Request $request){
    $request->validate([
      'menu_category_name' => 'required|unique:menu_categories,menu_category_name'
    ]);

    MenuCategory::insert([
      'menu_category_name' => Str::title($request->menu_category_name),
      'created_at' => Carbon::now(),
    ]);
    return back()->with('ADD_MENU_CATEGORY_ALERT', 'One menu category added successfully!');
  }

  function listmenucategory(){
    $title = "List Menu Category";
    return view('dashboard.menu_category_list',compact('title'), [
      'menu_categories' => MenuCategory::latest()->get(),
      'deleted_menu_categories' => MenuCategory::onlyTrashed()->get(),
    ]);
  }

  // method menucategoryupdate start
  function menucategoryupdate($menu_category_id){
    $title = "Menu Category Update";
    $menu_cat_infos = MenuCategory::find($menu_category_id);
    return view('dashboard.menu_category_update', compact('menu_cat_infos','title'));
  }
  // method menucategoryupdate end

  // method menucategoryupdatepost start
  function menucategoryupdatepost(Request $request){
    $request->validate([
      'menu_category_name' => 'required|unique:menu_categories,menu_category_name'
    ]);
    MenuCategory::find($request->menu_category_id)->update([
      'menu_category_name' => $request->menu_category_name
    ]);
    return back()->with('update_menu_category_alert', 'Menu category updated suceessfully!');
  }
  // method menucategoryupdatepost end

  // method menucategorydelete start
  function menucategorydelete($category_id){
    MenuProduct::where('menu_category_id', $category_id)->delete();
    MenuCategory::find($category_id)->delete();
    return back()->with('category_deleted_alert', 'One category item deleted!');
  }
  // method menucategorydelete end

  // method menucategoryrestore start
  function menucategoryrestore($category_id){
    MenuProduct::onlyTrashed()->where('menu_category_id', $category_id)->restore();
    MenuCategory::onlyTrashed()->find($category_id)->restore();
    return back()->with('category_restore_alert', 'One category item moved to trashed!');
  }
  // method menucategoryrestore end

  // method menucategoryharddelete start
  function menucategoryharddelete($category_id){
    $del_menu_products_infos = MenuProduct::onlyTrashed()->where('menu_category_id', $category_id)->get();
    foreach ($del_menu_products_infos as $info) {
      $delete_category_products_image_location = base_path('public/uploads/menus/'.$info->menu_thumbnail);
      unlink($delete_category_products_image_location);
    }
    MenuProduct::onlyTrashed()->where('menu_category_id', $category_id)->forceDelete();
    MenuCategory::onlyTrashed()->find($category_id)->forceDelete();
    return back()->with('category_hard_delete_alert', 'One category item permanently deleted!');
  }
  // method menucategoryharddelete end
}
