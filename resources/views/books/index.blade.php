@extends('common.layouts.main')

@section('content')
    <div class="form-container">
        @include('books.inc.search')
        @include('books.inc.create')
    </div>
    <h3 class="header header--title">Results:</h3>
    @include('books.inc.results')
@endsection
