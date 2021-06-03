@extends('layouts.app')

@section('content')
    <h1>books4u</h1>

    <form action="/" method="GET">
        <label for="search">Search</label>
        <input type="text" name="search" id="search">
        <label for="search_type">Search by</label>
        <select name="search_type" id="search_type">
            @foreach ($search_params as $value => $param)
                <option value="{{ $value }}">{{ $param }}</option>
            @endforeach
        </select>
        <input type="submit" value="submit">
    </form>

    <form action="/books/create" method="POST">
        @csrf
        <label for="author">Book Author</label>
        <select name="author" id="author">
            @foreach ($authors as $author)
                <option value="{{ $author->id }}">{{ $author->full_name }}</option>
            @endforeach
        </select>
        <label for="title">Title</label>
        <input id="title" name="title" type="text">
        <p><input type="submit" value="submit"></p>
    </form>

    @if (count($books) > 0)
        @foreach ($books as $book)
        <p>{{ $book->title }} by <a href="/author/{{ $book->author->id }}">{{ $book->author->full_name }}</a></p>
        <form action="/books/delete/{{ $book->id }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="delete">
        </form>
        @endforeach
    @else
        <p>No Results!</p>
    @endif

    @if (method_exists($books, 'links'))
        {{ $books->links() }}
    @endif

@endsection
