
<ul>
    <li>{{ $book->bookInfo->title }}</li>
    <li>{{ $book->bookInfo->id}}</li>
    <li><img src={{$book->bookInfo->img}} alt="NoImage"></li>
    <li>{{ $book->status }}</li>
</ul>
<a href={{route('books.edit',['book'=>$book->id])}}><button>edit</button></a>
