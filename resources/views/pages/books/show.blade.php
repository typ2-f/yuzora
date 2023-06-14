<ul>
    <li>{{ $book->bookInfo->title }}</li>
    <li><img src={{ $book->bookInfo->img }} alt="No Image"></li>
    <li>{{ $book->bookInfo->price }}</li>
    <li>{{ $book->bookInfo->publisher }}</li>
    <li>{{ $book->bookInfo->contributor }}</li>
    <li>{{ $book->bookInfo->publishing_date }}</li>
    <li>{{ $book->bookInfo->product_form }}</li>
    <li>{{ $book->status }}</li>
    <li>{{ $book->remarks }}</li>

</ul>
<a href={{ route('books.edit', ['book' => $book->id]) }}><button>edit</button></a>
