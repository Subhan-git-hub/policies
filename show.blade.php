<x-layout>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Title</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
    <tr>@php $sno = 1; @endphp
      <th scope="row">{{$sno++ }}</th>
      <td>{{$book->title}}</td>
      <td>{{$book->price}}</td>
    </tr>
  </tbody>
</table>
<a href="{{ route('books.index') }}" class="btn btn-danger">Back</a>


</x-layout>