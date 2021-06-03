@extends('layouts.app')

@section('content')
    <h1>books4u</h1>

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
