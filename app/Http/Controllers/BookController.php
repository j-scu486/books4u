<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Author;

class BookController extends Controller
{
    protected array $search_params;

    public function __construct()
    {
        $this->search_params = [
            'title' => 'Title',
            'author' => 'Author',
        ];
    }

    public function show()
    {
        return view('books.index', [
                            'books' => Book::orderBy('title')->simplePaginate(5),
                            'authors' => Author::all(),
                            'search_params' => $this->search_params
                            ]);
    }

    public function showBySearchQuery(Request $request)
    {
        $books = '';
        $url_query = $request->query();

        if(array_key_exists('search', $url_query)) {
            $books = Book::searchQuery($url_query);
        } else if (count($url_query) > 0) {
            $books = Book::orderQuery($url_query);
        }

        return view('books.index', [
            'books' => $books->simplePaginate(5),
            'authors' => Author::all(),
            'search_params' => $this->search_params
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
