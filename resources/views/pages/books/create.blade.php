<h1>create</h1>
<form action='/books' method="post">
    @csrf
    <input type="number" name="storage_id" id="storage_id" placeholder="storage">
    <input type="number" name="isbn" id="isbn" placeholder="isbn" autofocus>
    <button type="button" id="getBookInfo" class="btn">書籍情報を取得</button>
    <div id="bookInfo">
        <div class="bookImageBlock">
            <div class="bookImageInner">
                <img src="" id="thumbnail">
            </div>
        </div>

        <input type="text" name="title" id="title" placeholder="title">
        <input type="text" name="img" id="img" placeholder="img">
        <input type="text" name="price" id="price" placeholder="price">
        <input type="text" name="publisher" id="publisher" placeholder="publisher">
        <input type="text" name="contributor" id="contributor" placeholder="contributor">
        <input type="text" name="publishing_date" id="publishing_date" placeholder="publishing_date">
    </div>
    <input type="text" name="product_form" id="product_form" placeholder="product_form">
    <input type="number" name="status" id="status" placeholder="status">
    <input type="submit" value="submit">
</form>
<script src="{{ asset('js/isbn.js') }}"></script>