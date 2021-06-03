@extends('common.layouts.main')

@section('content')
    @include('books.inc.search')
    @include('books.inc.create')
    @include('books.inc.results')
@endsection
