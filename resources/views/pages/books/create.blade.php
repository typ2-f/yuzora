<h1>create</h1>
<form action={{ route('books.store') }} method="post">
    @csrf

    <ul>
        <li class="input_li" id="input_li_storage">
            <label for="storage">書庫</label>
            <select name="storage" id="storage">
                @foreach ($storages as $storage)
                    <option value={{ $storage->id }}>{{ $storage->name }}</option>
                @endforeach
            </select>
            <input type="submit" value="submit">
        </li>
        <li class="input_li" id="input_li_status">
            <label for="status">状態</label>
            <select name="status" id="status">
                <option value="1">非常に良い</option>
                <option value="2">良</option>
                <option value="3">可</option>
            </select>
        </li>
        <li class="input_li" id="input_li_remarks">
            <label for="remarks">備考</label>
            <input type="text" name="remarks" id="remarks" placeholder="remarks">
        </li>
        <li class="input_li" id="input_li_isbn">
            <label for="isbn">ISBN</label>
            <input type="text" name="isbn" id="isbn" placeholder="isbn" autofocus>
            <input type="hidden" name="isbn_check" id="isbn_check" value="false">
            <button type="button" id="btn_book_info" class="btn" value="false">書籍情報を取得</button>
        </li>
        <li class="book_image" id="book_img">
            <img src="" id="thumbnail">
            <input type="hidden" name="img" id="img" placeholder="img" value="">
        </li>
        <li class="input_li" id="input_li_title">
            <label for="title">タイトル</label>
            <input type="text" name="title" id="title" placeholder="title">
        </li>
        <li class="input_li" id="input_li_price">
            <label for="price">定価</label>
            <input type="text" name="price" id="price" placeholder="price">
        </li>
        <li class="input_li" id="input_li_publisher">
            <label for="publisher">出版社</label>
            <input type="text" name="publisher" id="publisher" placeholder="publisher">
        </li>
        <li class="input_li" id="input_li_contributor">
            <label for="contributor">著者</label>
            <input type="text" name="contributor" id="contributor" placeholder="contributor">
        </li>
        <li class="input_li" id="input_li_publishing_date">
            <label for="publishing_date">発行日</label>
            <input type="text" name="publishing_date" id="publishing_date" placeholder="publishing_date">
        </li>
        <li class="input_li" id="input_li_product_form">
            <label for="product_form">版型</label>
            <input type="text" name="product_form" id="product_form" placeholder="product_form">
        </li>

    </ul>

</form>
<script src="{{ asset('js/isbn.js') }}"></script>
