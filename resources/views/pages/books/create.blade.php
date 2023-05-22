{{-- 書籍を新規に登録するページ --}}
<h1>books.create</h1>
<form method="post" action="{{route('books.store')}}">
    @csrf
    <div>
        <label for="isbn">ISBN</label>
        <input id="isbn"type="text"name="isbn"value={{old('isbn')}}>
    </div>
</form>
