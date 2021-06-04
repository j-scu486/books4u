@extends('common.layouts.main')

@section('content')
    <div class="author-container">
        <form class="form form--author" action="/author/{{ $author->id }}" method="POST">
            <h3 class="header header--title">
                If {{ $author->full_name }} didn't write all these books... <br>then who did?
            </h3>
            @csrf
            <div class="form-group">
                <label class="form-label" for="full_name">Author Name</label>
                <input class="form-control" type="text" name="full_name" id="full_name" value="{{ $author->full_name }}">
            </div>
            <div class="form-group">
                <input class="btn btn--form-submit" type="submit" value="change">
            </div>
        </form>
    </div>
@endsection
