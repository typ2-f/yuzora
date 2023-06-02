<h1>storages/{storage}/books</h1>
<ul>
    @foreach ($books as $book)
        <a href={{ route('books.show', ['book' => $book->id]) }}>
            <li>{{ $book->bookInfo->title }}</li>
        </a>
    @endforeach
</ul>
