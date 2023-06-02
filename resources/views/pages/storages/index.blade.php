<h1>storages.index</h1>
<a href={{ route('storages.create') }}>create</a>
<ul>
    @foreach ($storages as $storage)
        <a href={{ route('storages.books', ['storage' => $storage->id]) }}>
            <li>{{ $storage->name }}</li>
            <li>{{ $storage->address }}</li>
        </a>
        <a href={{ route('storages.show', ['storage' => $storage->id]) }}>
            保管場所の詳細
        </a>
    @endforeach
</ul>
