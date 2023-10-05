<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class BookController extends Controller
{

// public function index() for displaying all the books
    public function index()
    {

        $books = DB::table('books')->paginate(10);
        return view('books.allbooks', ['books' => $books]);
    }
    // public function create() for creating a new book
    public function edit(Book $book)
    {
        $categories = ["Comics", "Fiction", " Novels", "Non-Fiction", "Science", "Magazines", "Technology", "TextBooks"];
        return view('books.edit', compact('book', 'categories'));
    }

    // public function update() for updating the book details
    public function update(Request $request, Book $book)
    {
        $data = $request->validate([
            
            'ISBN' => 'required',
            'Book_title' => 'required',
            'Author' => 'required',
            'Publisher' => 'required',
            'Edition' => 'required',
            'Category' => 'required',
            'Rack' => 'required',
            'CopiesAvailable' => 'required|numeric',
            'Price' => 'required|numeric',
            'PublicationDate' => 'required|date',
            'BookURL' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // dd($data);
        $book->update($data);

        if ($request->hasFile('BookURL')) {
            $image = $request->file('BookURL');
            $imageName = $image->getClientOriginalName();
            $image->storeAs('uploads', $imageName, 'public');

            $book->BookURL = $imageName;
        }

        $book->save();
          echo 'Book updated successfully';
        return redirect()->route('books.allbooks')->with('success', 'Book updated successfully');

    }


    public function destroy(Book $book)
    {
        
        if (!request()->has('confirmed')) {
            return redirect()->back()->with('warning', 'Delete operation canceled.');
        }
        $book->delete();
        return redirect()->route('books.allbooks')->with('success', 'Book deleted successfully');
    }

    // public function create() for storing the book details
    public function store(Request $request)
    {

        $rules = [
            'BookTitle' => 'required',
            'ISBN' => 'required',
            'Author' => 'required',
            'Publisher' => 'required',
            'Edition' => 'required',
            'category' => 'required',
            'rackno' => 'required',
            'CopiesAvailable' => 'required|numeric',
            'Price' => 'required|numeric',
            'PublicationDate' => 'required|date',
            'BookURL' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
        $request->validate($rules);
        $maxBookID = DB::table('books')->max('BookID');
        $nextBookID = $maxBookID + 1;

        $book = new Book([
            'BookID' => $nextBookID,
            'Book_title' => $request->input('BookTitle'),
            'ISBN' => $request->input('ISBN'),
            'Author' => $request->input('Author'),
            'Publisher' => $request->input('Publisher'),
            'Edition' => $request->input('Edition'),
            'Category' => $request->input('category'),
            'Rack' => $request->input('rackno'),
            'CopiesAvailable' => $request->input('CopiesAvailable'),
            'Price' => $request->input('Price'),
            'PublicationDate' => $request->input('PublicationDate'),
        ]);

        if ($request->hasFile('BookURL')) {
            $image = $request->file('BookIURL');
            $imageName = $image->getClientOriginalName();
            $imagePath = $image->storeAs('uploads', $imageName, 'public');

            $book->BookURL = $imagePath;
        }

        $book->save();

        return redirect()->route('books.allbooks')->with('success', 'Book added successfully');
    }
    // public function search() for searching the book  from the database
    public function search(Request $request)
{
    $query = $request->input('query');

    $books = DB::table('books')
        ->where('Book_title', 'like', '%' . $query . '%')
        ->orWhere('Author', 'like', '%' . $query . '%')
        ->paginate(10);

    return view('books.allbooks', ['books' => $books]);
}
}
