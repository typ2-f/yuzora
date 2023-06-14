<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\Type\NullType;
use App\Http\Controllers\BookInfoController;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $books = Book::with('bookInfo', 'storage')->where('user_id', $user_id)->get();
        return view('pages/books/index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $storages= Auth::user()->storages;
        return view('pages/books/create',compact('storages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $book_info_id = BookInfoController::store($request, $user_id);
        Book::create([
            'user_id' => $user_id,
            'storage_id' => $request->storage_id,
            'book_info_id' => $book_info_id,
            'status' => $request->status,
            'sold' => false,
            'remarks' => $request->remarks
        ]);
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $book = Book::with('bookInfo')->find($id);
        return view('pages/books/show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $book = Book::with('bookInfo')->find($id);
        $user_id = Auth::user()->id;
        if ($book->user_id !== $user_id) {
            return back()->with('alert', '不正なリクエストです');
        }
        $storages = Auth::user()->storages;
        return view('pages/books/edit', compact('book','storages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $book = Book::find($id);
        $book_info_id = $book->book_info_id;
        BookInfoController::update($request, $book_info_id);

        $book->storage_id = $request->storage_id;
        $book->status = $request->status;
        $book->sold = $request->sold;
        $book->remarks = $request->remarks;
        $book->save();
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        Book::destroy($id);
        return redirect('/books');
    }
}
