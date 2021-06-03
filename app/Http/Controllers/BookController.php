<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Author;

class BookController extends Controller
{
    public function show(Request $request)
    {
        $url_query = $request->query();
        $books = Book::orderBy('title');
        $authors = Author::all();
        $search_params = [
            'title' => 'Title',
            'author' => 'Author',
        ];

        if(array_key_exists('search', $url_query)) {
            $books = Book::searchQuery($url_query);
        } else if (count($url_query) > 0) {
            $books = Book::orderQuery($url_query);
        }

        return view('index', [
                            'books' => $books->simplePaginate(5),
                            'authors' => $authors,
                            'search_params' => $search_params
                            ]);
    }

    public function store(Request $request)
    {
        $book = new Book();

        $this->validate($request, [
            'title' => 'required',
            'author' => 'required'
        ]);

        $book->title = $request->input('title');
        $book->author_id = (int)$request->input('author');
        $book->save();

        return redirect('/')->with('success', 'You added a new book!');
    }

    public function destroy(int $id)
    {
        $book = Book::find($id);
        $book->delete();

        return redirect('/')->with('success', 'Book deleted!');
    }
}
