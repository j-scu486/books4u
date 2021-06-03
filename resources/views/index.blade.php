@extends('layouts.app')

@section('content')
    <h1>books4u</h1>

    @include('inc.search')

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
