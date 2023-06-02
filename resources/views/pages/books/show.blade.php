<ul>
    <li>titile:{{ $book->bookInfo->title }}</li>
    <li>isbn:{{ $book->bookInfo->isbn }}</li>
    <li>status:{{ $book->status }}</li>
</ul>
<a href={{route('books.edit',['book'=>$book->id])}}><button>edit</button></a>
