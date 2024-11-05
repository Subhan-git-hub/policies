<x-layout>
<div class="container my-3 ">
<h2 class="text-center">Books Crud</h2>
<h3>Hello {{ Auth::user()->name }}</h3>
<table class="table  text-center">
    <a href="{{ route('books.create') }}" class="btn btn-success mb-2">Add User</a>
    <a href="{{ route('logout') }}" class="btn btn-danger mx-2 mb-2">Logout</a>


    @if(session('status'))
    <div class="container">
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    </div>


    @endif
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Title</th>
      <th scope="col">Price</th>
      <th scope="col">View</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>

    </tr>
  </thead>
  <tbody>
     {{--<!-- @php $sno = 1; @endphp -->--}}
    @foreach($book as $books)
    <tr>
       
      <th scope="row">{{ $books->id }}</th>
      <td>{{$books->title}}</td>
      <td>{{$books->price}}</td>

      <!-- we can also use if else condition of policies in the blade files -->

      {{-- <!-- if(Auth::user()->can('policymethod',$books)) -->
       <!-- @canany(['update','delte','view'],$books) -->
       <!-- @can('view',$books) -->--}}

       <!-- only the user with same user id and book user_id can view thier crud opertaion -->

       <td> <a href="{{ route('books.show',$books->id) }}" class="btn btn-primary">View</a> </td>
       <td> <a href="{{ route('books.edit',$books->id) }}" class="btn btn-warning">Update</a> </td>

       <!-- like can we can also use canany in which we give an array of method conditions which need to be true from the book policy -->
       
       
       <form action="{{ route('books.destroy',$books->id) }}" method="POST">
         @csrf
         @method('DELETE')
         <td> <button type ="submit" class="btn btn-danger">delete</button> </td>
        </form>

        
         {{-- <!-- @endif -->
          <!-- @endcan -->
        <!-- @endcanany -->--}}



    </tr>
    @endforeach
  
  </tbody>
</table>
  
 
</div>


</x-layout>