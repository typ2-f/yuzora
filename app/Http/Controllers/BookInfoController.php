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
  public static function store($request, $user_id)
  {
    if ($request->isbn_check === true) {
      $book_info = BookInfo::firstOrCreate(
        [
          'user_id' => $user_id,
          'isbn' => $request->isbn
        ],
        [
          'title' => $request->title,
          'img' => $request->img,
          'price' => $request->price,
          'publisher' => $request->publisher,
          'contributor' => $request->contributor,
          'publishing_date' => $request->publishing_date,
          'product_form' => $request->product_form
        ]

      );
    }else{
      $book_info = BookInfo::Create(
        [
          'user_id' => $user_id,
          'isbn' => Null,
          'title' => $request->title,
          'img' => $request->img,
          'price' => $request->price,
          'publisher' => $request->publisher,
          'contributor' => $request->contributor,
          'publishing_date' => $request->publishing_date,
          'product_form' => $request->product_form
        ]
      );
    }
    $id = $book_info->id;
    return $id;
  }
  public static function update($request, int $id)
  {

    $book_info = BookInfo::find($id);
    //isbnから入れた情報は消せないようにする
    if (isset($book_info->isbn)) {
      return false;
    }
    $book_info->title = $request->title;
    $book_info->img = $request->img;
    $book_info->price = $request->price;
    $book_info->publisher = $request->publisher;
    $book_info->contributor = $request->contributor;
    $book_info->publishing_date = $request->publishing_date;
    $book_info->product_form = $request->product_form;

    $book_info->save();
    return true;
  }
}
