<h1>storages.show</h1>
<ul>
    <li>name:{{ $storage->name }}</li>
    <li>address:{{ $storage->address }}</li>
</ul>
<a href='/storages/{{ $storage->id }}/edit'><button>edit</button></a>