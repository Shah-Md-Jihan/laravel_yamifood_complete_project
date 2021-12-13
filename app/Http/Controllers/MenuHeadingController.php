<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuCategoryHeadings;
use Carbon\Carbon;
use Illuminate\Support\Str;

class MenuHeadingController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  // method addmenuheadings start
  function addmenuheadings(){
    $title = "Add Menu Headings";
    return view('dashboard.add_menu_headings',compact('title'));
  }
  // method addmenuheadings end

  // method addmenuheadingspost start
  function addmenuheadingspost(Request $request){
    $request->validate([
      'menu_headings' => 'required'
    ]);
    if(Str::wordCount($request->menu_headings) > 30){
      return back()->with('big_headings_alert', 'Please write your heading with in 30 words!')->withInput();
    }
    else{
      MenuCategoryHeadings::insert([
        'menu_headings' => $request->menu_headings,
        'created_at' => Carbon::now(),
      ]);
      return back()->with('add_category_heading_alert', 'Your menu heading added successfully!');
    }
  }
  // method addmenuheadingspost end

  // method listmenuheadings start
  function listmenuheadings(){
    $title = "List Menu Headings";
    return view('dashboard.list_menu_heading',compact('title'),[
      'menu_category_headings' => MenuCategoryHeadings::latest()->get()
    ]);
  }
  // method listmenuheadings end

  // method updatemenuheadings start
  function updatemenuheadings($menu_heading_id){
    $title = "Update Menu Heading";
    $menu_heading_info = MenuCategoryHeadings::find($menu_heading_id);
    return view('dashboard.update_menu_heading',compact('title','menu_heading_info'));
  }
  // method updatemenuheadings end

  // method updatemenuheadingspost start
  function updatemenuheadingspost(Request $request){
    $menu_heading_id = $request->menu_heading_id;
    $request->validate([
      'menu_headings' => 'required'
    ]);
    if(Str::wordCount($request->menu_headings) > 30){
      return back()->with('big_headings_alert', 'Please write your heading with in 30 words!');
    }
    else{
      MenuCategoryHeadings::find($menu_heading_id)->update([
        'menu_headings' => $request->menu_headings
      ]);
      return back()->with('update_category_heading_alert', 'Your menu heading updated successfully!');
    }
  }
  // method updatemenuheadingspost end

  // method menuheadingdelete start
  function menuheadingdelete($menu_heading_id){
    MenuCategoryHeadings::find($menu_heading_id)->delete();
    return back()->with('delete_category_heading_alert', 'Your menu heading has been deleted!');
  }
  // method menuheadingdelete end
}
