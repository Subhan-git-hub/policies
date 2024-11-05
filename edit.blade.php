<x-layout>
<form action="{{ route('books.update',$book->id) }}" method="POST">
@csrf
@method('PUT')
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" value ="{{ $book->title }}" class="form-control" id="title" name="title">
  </div>

  <div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input type="number" value ="{{ $book->price }}" class="form-control" id="price" name="price">
  </div>

  <div class="mb-3">
    <label for="user_id" class="form-label">User Id</label>
    <input type="number" value ="{{ $book->user_id }}" class="form-control" id="user_id" name="user_id">
  </div>

  <button type="submit" class="btn btn-primary">Update</button>  
  <a href="{{ route('books.index') }}" class="btn btn-danger">Back</a>
</form>

     


</x-layout>