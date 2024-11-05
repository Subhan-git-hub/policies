<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use Illuminate\Support\Facades\Gate;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $book = Book::with('user')->get();
        $book = Book::all();//sending books table data to the index file

        return view('index',compact('book'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'price' => 'required',
            'user_id' => 'required',
        ]);
        Book::create($data);
        return redirect()->route('books.index')->with('status','book added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::findorFail($id);//getting $id from the route of view btn in index file

        Gate::authorize('view',$book);
        return view('show',compact('book'));//sending data of single user to the show blade file
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::findorFail($id);//checks if the edit id in the edit blade form action and logged in user id same or not

        Gate::authorize('update',$book);
        return view('edit',compact('book'));//sent data of the user as the default values of the input fields
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = Book::findorFail($id);
        //we have to send id with Book model as in the $book variable it is necessary//
        Gate::authorize('update',$book);//we are checking that if the book user_id and the user id is same or not

        // another method to stop user if he does not have the same user id as book user_id//

        // if($request->user()->cannot('update',$book)){
        //     abort(403,"sharam krle kisi or ki id chura rha ha");
        // }
        //now this condition will stop the fraud user if doesn't have the same id as book user_id and if he has the sam eid the code below will run automatically//

        $data = $request->validate([
            'title' => 'required|string',
            'price' => 'required',
            'user_id' => 'required',
        ]);

        Book::where('id',$id)->update([
            'title' => $request->title,
            'price' => $request->price,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('books.index')->with('status','book updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);
        Gate::authorize('delete',$book);
        $data->delete();
        return redirect()->route('books.index')->with('status','book deleted successfully');


        
    }
}
