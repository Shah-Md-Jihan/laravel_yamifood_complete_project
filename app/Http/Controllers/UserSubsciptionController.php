<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Subsciption;
use Carbon\Carbon;

class UserSubsciptionController extends Controller
{
  // method addsubcription start
  function addsubcription(Request $request){
    $ip_address = request()->ip();
    $user_email = $request->user_email;
    $request->validate([
      'user_email' => 'required|unique:subsciptions,user_email|email'
    ]);
    Subsciption::insert([
      'ip_address' => $ip_address,
      'user_email' => $user_email,
      'created_at' => Carbon::now(),
    ]);
    return back();
  }
  // method addsubcription end

  // method subcriptiondelete start
  function subcriptiondelete(){
    $ip_address = request()->ip();
    Subsciption::where('ip_address', $ip_address)->delete();
    return back();
  }
  // method subcriptiondelete end
}
