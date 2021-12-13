<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;

class MailboxController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  // method mailbox start
  function mailbox(){
    $title = "Mailbox";
    return view('dashboard.mailbox',compact('title'),[
      'mails' => ContactMessage::latest()->paginate(10)
    ]);
  }
  // method mailbox end

  // method mailmarkread start
  function mailmarkread($mail_id){
    echo ContactMessage::find($mail_id)->update([
      'role' => 2
    ]);
    return back();
  }
  // method mailmarkread end

  // method mailread start
  function mailread($mail_id){
    $title = "Mail Read";
    $mail_info = ContactMessage::find($mail_id);
    return view('dashboard.mailbody', compact('title','mail_id','mail_info'));
  }
  // method mailread end

  // method maildelete start
  function maildelete($mail_id){
    ContactMessage::find($mail_id)->delete();
    return back()->with('mail_delete_alert','Mail deleted successfully!');
  }
  // method maildelete end
}
