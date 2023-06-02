<h1>storages.show</h1>
<ul>
    <li>name:{{ $storage->name }}</li>
    <li>address:{{ $storage->address }}</li>
</ul>
<a href={{ route('storages.edit', ['storage' => $storage->id]) }}><button>edit</button></a>
