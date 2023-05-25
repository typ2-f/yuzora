<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Fanzine;
use App\Models\IsbnBook;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\Type\NullType;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_books = Book::where('user_id', Auth::user()->id)->get();
        $books = new Collection();
        foreach ($user_books as $user_book) {
            switch (true) {
                case isset($user_book->isbn_id):
                    $isbn_book = IsbnBook::find($user_book->isbn_id);
                    $books->concat($isbn_book);
                    break;
                case isset($user_book->fanzine_id):
                    $fanzine = Fanzine::find($user_book->fanzine_id);
                    $books->concat($fanzine);
                    break;
                default:
                    //エラー
            }
        }
        return view('pages/books/index', compact('books'));
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
        switch (true) {
            case $request->fanzine:
                $fanzine = Fanzine::firstOrCreate(
                    ['title' => $request->title],
                    [
                        'img' => $request->img,
                        'price' => $request->price,
                        'publisher' => $request->publisher,
                        'contributor' => $request->contributor,
                        'publishing_date' => $request->publishing_date,
                        'form' => $request->form
                    ]
                );
                $fanzine_id = $fanzine->id;
                $isbn_id = Null;
                break;
            case isset($request->isbn):
                $isbn = IsbnBook::firstOrCreate(
                    ['isbn' => $request->isbn],
                    [
                        'title' => $request->title,
                        'img' => $request->img,
                        'price' => $request->price,
                        'publisher' => $request->publisher,
                        'contributor' => $request->contributor,
                        'publishing_date' => $request->publishing_date,
                        'form' => $request->form
                    ]
                );
                $fanzine_id = Null;
                $isbn_id = $isbn->id;
                break;
        }
        Book::create([
            'user_id' => $user_id,
            'storage_id' => $request->storage_id,
            'fanzine_id' => $fanzine_id,
            'isbn_id' => $isbn_id,
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
        if ($book->user_id !== $user_id) {
            return false;
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
        $book = Book::find($id);
    }
}
