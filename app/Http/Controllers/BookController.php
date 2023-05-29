<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\Type\NullType;
use App\Http\Controllers\BookInformationController;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_books = Auth::user()->books->with('bookInformation')->get();
 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages/books/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;

        Book::create([
            'user_id' => $user_id,
            'storage_id' => $request->storage_id,
            'book_information_id'=> $request, //後から書き直す
            'status' => $request->status,
            'remarks' => $request->remarks,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $book = Book::find($id);
        if($book->fanzine_id)
        return view('pages/books/show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $book = Book::find($id);
        return view('pages/books/edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $book = Book::find($id);
        $user_id = Auth::user()->id;

        //第三者による不正な更新をチェック
        if ($book->user_id !== $user_id) {
            $msg = "不正なリクエストです";
            return back()->with($msg);
        }

        $book->title = $request->title;
        $book->storage_id = $request->storage_id;
        $book->status = $request->status;
        $book->sold = $request->sold;
        $book->remarks = $request->remarks;
        $book->save();
        return redirect()->route('books/index');
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
