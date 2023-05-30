<h1>storages.index</h1>
<a href='storages/create'>create</a>
<ul>
    @foreach ($storages as $storage)
        <a href='/storages/{{ $storage->id }}/books'>
            <li>{{ $storage->name }}</li>
            <li>{{ $storage->address }}</li>
        </a>
        <a href='/storages/{{ $storage->id }}'>
            保管場所の詳細
        </a>
    @endforeach
</ul>
