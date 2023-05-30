<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class StorageBookController extends Controller
{
    public function __invoke(int $storage_id)
    {
        /**
         * Display a listing of the resource.
         */

        $books = Book::with('bookInfo')->where('storage_id', $storage_id)->get();
        return view('pages/storages/books', compact('books'));
    }
}
