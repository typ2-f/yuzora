<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BookInfo;
use Illuminate\Http\Request;

class BookInfoController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public static function store($request)
  {
    $info = BookInfo::firstOrCreate(
      ['isbn' => $request->isbn],
      ['title' => $request->title]
    );
    $id = $info->id;
    return $id;
  }
  public static function update($request, int $id)
  {
    $book_info = BookInfo::find($id);
    if(isset($book_info->isbn)){
      return false;
    }
    $book_info->title = $request->title;
    $book_info->save();
    return true;
  }
}
