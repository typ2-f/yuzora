<a href='books/create'>create</a>
<ul>
    @foreach ($books as $book)
        <a href='/books/{{$book->id}}'>
            <li>{{ $book->bookInfo->isbn }}</li>
            <li>{{ $book->bookInfo->title }}</li>
        </a>
    @endforeach
</ul>
