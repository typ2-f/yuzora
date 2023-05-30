<ul>
    <li>titile:{{ $book->bookInfo->title }}</li>
    <li>isbn:{{ $book->bookInfo->isbn }}</li>
    <li>status:{{ $book->status }}</li>
</ul>
<a href='/books/{{ $book->id }}/edit'><button>edit</button></a>
