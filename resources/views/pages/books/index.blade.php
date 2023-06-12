<a href='books/create'>create</a>
<ul>
    @foreach ($books as $book)
        <a href={{ route('books.show', ['book' => $book->id]) }}>
            <li>{{ $book->bookInfo->title }}</li>
        </a>
    @endforeach
</ul>
