<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Word;
use Carbon\Carbon;
use Illuminate\Support\Str;

class WordController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  // method addwords start
  function addwords(){
    $title = "Add Words";
    return view('dashboard.add_words',compact('title'));
  }
  // method addwords end

  // method addwordspost start
  function addwordspost(Request $request){
    $request->validate([
      'words' => 'required',
      'author' => 'required',
    ]);

    if (Str::wordCount($request->words) > 100) {
      return back()->with('big_content_alert', 'Your words must be less than 100 words!')->withInput();
    }else{
      Word::insert([
        'words' => $request->words,
        'author' => $request->author,
        'created_at' => Carbon::now(),
      ]);
    }
    return back()->with('add_word_alert', 'Your word added successfully!');
  }
  // method addwordspost end

  // method listwords start
  function listwords(){
    $title = "Word List";
    return view('dashboard.list_word',compact('title'),[
      'words' => Word::latest()->paginate(1)
    ]);
  }
  // method listwords end

  // method updatewords start
  function updatewords($word_id){
    $title = "Update Word";
    return view('dashboard.update_word',compact('title'),[
      'word_info' => Word::find($word_id)
    ]);
  }
  // method updatewords end

  // method updatewordspost start
  function updatewordspost(Request $request){
    $request->validate([
      'words' => 'required',
      'author' => 'required',
    ]);
    Word::find($request->word_id)->update([
      'words' => $request->words,
      'author' => $request->author,
    ]);

    return redirect('list/words')->with('word_update_alert', 'One word item updated successfully!');
  }
  // method updatewordspost end

  // method wordsdelete start
  function wordsdelete($word_id){
    Word::find($word_id)->delete();
    return back()->with('word_delete_alert', 'One word item successfully!');
  }
  // method wordsdelete end
}
