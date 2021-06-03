@extends('common.layouts.main')

@section('content')
    <form action="/author/{{ $author->id }}" method="POST">
        @csrf
        <label for="full_name">Author Name</label>
        <input type="text" name="full_name" id="full_name" value="{{ $author->full_name }}">
        <input type="submit" value="change">
    </form>
@endsection
