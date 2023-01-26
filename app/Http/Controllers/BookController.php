<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class BookController extends Controller
{
    public function index(){
        $books = App\Models\Book::join('authors', 'books.author_id', '=', 'authors.id')->select('books.*', 'authors.name as author_name')->get();
        return view('books', compact('books'));
    }

    public function add(){
        return view('add');
    }

    public function store(Request $request){
        $book = new App\Models\Book;
        $book->name = $request->name;

        $author = App\Models\Author::where('name', $request->author)->first();

        if ($author == null){
            $author = new App\Models\Author;
            $author->id = App\Models\Author::max('id') + 1;
            $author->name = $request->author;
            $author->save();

        }

        $book->author_id = $author->id;
        $book->description = $request->description;
        $book->page_count = $request->page_count;

        /*
            if request name is in author names
            book author id equals existing author id

            else create new author with that name
        */
        $book->save();
        return view('add');
    }
}
