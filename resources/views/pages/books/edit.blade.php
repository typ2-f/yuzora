<h1>book.edit</h1>
<div>{{ $book->bookInfo->title }}</div>
<div>{{ session('alert') }}</div>
<div>
    <form method="post" action={{ route('books.update', ['book' => $book->id]) }}>
        @csrf
        <ul>
            <li class="input_li" id="input_li_storage">
                <label for="storage">書庫</label>
                <select name="storage" id="storage">
                    @foreach ($storages as $storage)
                        <option value={{ $storage->id }}>{{ $storage->name }}</option>
                    @endforeach
                </select>
                <input type="hidden" name="_method" value="PATCH">
                <input type="submit" value="edit">
            </li>
            <li class="input_li" id="input_li_isbn">
                <label for="isbn">ISBN</label>
                <input type="text" name="isbn" id="isbn" placeholder="isbn"
                    value={{ $book->bookInfo->isbn }}>
                <button type="button" id="getBookInfo" class="btn">書籍情報を取得</button>
            </li>
            <li class="book_image" id="book_img">
                <img src={{ $book->bookInfo->img }} id="thumbnail" alt="No Image">
                <input type="hidden" name="img" id="img" placeholder="img" value=>
            </li>
            <li class="input_li" id="input_li_title">
                <label for="title">タイトル</label>
                <input type="text" name="title" id="title" placeholder="title"
                    value={{ $book->bookInfo->title }}>
            </li>
            <li class="input_li" id="input_li_price">
                <label for="price">定価</label>
                <input type="text" name="price" id="price" placeholder="price"
                    value={{ $book->bookInfo->price }}>
            </li>
            <li class="input_li" id="input_li_publisher">
                <label for="publisher">出版社</label>
                <input type="text" name="publisher" id="publisher" placeholder="publisher"
                    value={{ $book->bookInfo->publisher }}>
            </li>
            <li class="input_li" id="input_li_contributor">
                <label for="contributor">著者</label>
                <input type="text" name="contributor" id="contributor" placeholder="contributor"
                    value={{ $book->bookInfo->contributor }}>
            </li>
            <li class="input_li" id="input_li_publishing_date">
                <label for="publishing_date">発行日</label>
                <input type="text" name="publishing_date" id="publishing_date" placeholder="publishing_date"
                    value={{ $book->bookInfo->publishing_date }}>
            </li>
            <li class="input_li" id="input_li_product_form">
                <label for="product_form">版型</label>
                <input type="text" name="product_form" id="product_form" placeholder="product_form"
                    value={{ $book->bookInfo->product_form }}>
            </li>
            <li class="input_li" id="input_li_status">
                <label for="status">状態</label>
                <select name="status" id="status" value={{ $book->status }}>
                    <option value="1">非常に良い</option>
                    <option value="2">良</option>
                    <option value="3">可</option>
                </select>
            </li>
            <li class="input_li" id="input_li_remarks">
                <label for="remarks">備考</label>
                <input type="text" name="remarks" id="remarks" placeholder="remarks" value={{ $book->remarks }}>
            </li>
        </ul>
    </form>
</div>

<div>
    <form method="post" action={{ route('books.destroy', ['book' => $book->id]) }}>
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <input type="submit" value="delete!!">
    </form>
</div>
<script src="{{ asset('js/isbn.js') }}"></script>
