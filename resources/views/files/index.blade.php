@extends('common.layouts.main')

@section('content')
    <div class="files-container">
        <div class="file-item-container">
            <div class="file-item">
                <h3 class="header header--title">Download as CSV</h3>
                <small class="text-small">Author and Title</small>
                <button class="btn btn--download"><a href="{{ route ('files.download-csv', 'all_data')}}">Download</a></button>
            </div>
            <div class="file-item">
                <small class="text-small">Title Only</small>
                <button class="btn btn--download"><a href="{{ route ('files.download-csv', 'title_only')}}">Download</a></button>
            </div>
            <div class="file-item">
                <small class="text-small">Author Only</small>
                <button class="btn btn--download"><a href="{{ route ('files.download-csv', 'author_only')}}">Download</a></button>
            </div>
        </div>
        <div class="file-item-container">
            <div class="file-item">
                <h3 class="header header--title">Download as XML</h3>
                <small class="text-small">Author and Title</small>
                <button class="btn btn--download"><a href="{{ route ('files.download-xml', 'all_data')}}">Download</a></button>
            </div>
            <div class="file-item">
                <small class="text-small">Title Only</small>
                <button class="btn btn--download"><a href="{{ route ('files.download-xml', 'title_only')}}">Download</a></button>
            </div>
            <div class="file-item">
                <small class="text-small">Author Only</small>
                <button class="btn btn--download"><a href="{{ route ('files.download-xml', 'author_only')}}">Download</a></button>
            </div>
        </div>
    </div>
@endsection
