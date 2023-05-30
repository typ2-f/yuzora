<h1>storages/{storage}/books</h1>
<ul>
    @foreach ($books as $book)
        <a href='/books/{{$book->id}}'>
            <li>{{ $book->bookInfo->title }}</li>
        </a>
    @endforeach
</ul>
