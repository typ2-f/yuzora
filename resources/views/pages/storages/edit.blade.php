<h1>storages.edit</h1>
{{$storage->name}}
<form method="post" action="/storages/{{$storage->id}}">
  @csrf
    <input type="text" name="name" id="name" value={{$storage->name}} placeholder="name">
    <input type="text" name="address" id="address" value={{$storage->address}} placeholder="adddress">
    <input type="hidden" name="_method" value="PATCH">
    <input type="submit" value="update!!">
</form>
<form method="post" action="/storages/{{$storage->id}}">
  @csrf
    <input type="hidden" name="_method" value="DELETE">
    <input type="submit" value="delete!!">
</form>