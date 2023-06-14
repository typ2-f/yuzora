<h1>create</h1>
<form action={{ route('books.store') }} method="post">
    @csrf

    <div>
        <div class="input" id="input_storage">
            <x-input-label for="storage" value='書庫' />
            <select name="storage" id="storage">
                @foreach ($storages as $storage)
                    <option value={{ $storage->id }}>{{ $storage->name }}</option>
                @endforeach
            </select>
            <input type="submit" value="submit">
        </div>
        <div class="input_div" id="input_status">
            <label for="status">状態</label>
            <select name="status" id="status">
                <option value="1">非常に良い</option>
                <option value="2">良</option>
                <option value="3">可</option>
            </select>
        </div>
        <div class="input" id="input_remarks">
            <label for="remarks">備考</label>
            <input type="text" name="remarks" id="remarks" placeholder="remarks">
        </div>
        <div class="input" id="input_isbn">
            <label for="isbn">ISBN</label>
            <input type="text" name="isbn" id="isbn" placeholder="isbn" :value="old('isbn')" autofocus>
            <input type="hidden" name="isbn_check" id="isbn_check" value="false">
            <button type="button" id="btn_book_info" class="btn" value="false">Get</button>
        </div>

        <div class="book_image" id="book_img">
            <img src="" id="thumbnail">
            <input type="hidden" name="img" id="img" placeholder="img" value="">
        </div>
        <div class="input" id="input_title">
            <label for="title">タイトル</label>
            <input type="text" name="title" id="title" placeholder="title">
        </div>
        <div class="input" id="input_price">
            <label for="price">定価</label>
            <input type="text" name="price" id="price" placeholder="price">
        </div>
        <div class="input" id="input_publisher">
            <label for="publisher">出版社</label>
            <input type="text" name="publisher" id="publisher" placeholder="publisher">
        </div>
        <div class="input" id="input_contributor">
            <label for="contributor">著者</label>
            <input type="text" name="contributor" id="contributor" placeholder="contributor">
        </div>
        <div class="input" id="input_publishing_date">
            <label for="publishing_date">発行日</label>
            <input type="text" name="publishing_date" id="publishing_date" placeholder="publishing_date">
        </div>
        <div class="input" id="input_product_form">
            <label for="product_form">版型</label>
            <input type="text" name="product_form" id="product_form" placeholder="product_form">
        </div>

    </div>

</form>
<script src="{{ asset('js/isbn.js') }}"></script>
