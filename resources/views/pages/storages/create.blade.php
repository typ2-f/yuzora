<h1>storages.create</h1>
<form action='/storages' method="post">
  @csrf
  <input type="text" name="name" id="name" placeholder="name">
  <input type="text" name="address" id="address" placeholder="address">                                                                       
  <input type="submit" value="submit">
</form>