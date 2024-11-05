<x-layout>
<form action="{{ route('books.store') }}" method="POST">
@csrf
@method('POST')
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" id="title" name="title">
  </div>

  <div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input type="number" class="form-control" id="price" name="price">
  </div>

  <div class="mb-3">
    <label for="user_id" class="form-label">User Id</label>
    <input type="number" class="form-control" id="user_id" name="user_id">
  </div>

  <button type="submit" class="btn btn-primary">Add</button>
</form>
<div class="container my-3 text-center">
      <a href="{{ route('books.index') }}" class="btn btn-danger">Back</a>
</div>



</x-layout>