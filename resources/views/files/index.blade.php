@extends('common.layouts.main')

@section('content')
    <div class="files-container">
        <div class="file-item-container">
            <div class="file-item">
                <h3 class="header header--title">Download as CSV</h3>
                <small class="text-small">Author and Title</small>
                <a href="{{ route ('files.download-csv', 'all_data')}}"><button class="btn btn--download">Download</button></a>
            </div>
            <div class="file-item">
                <small class="text-small">Title Only</small>
                <a href="{{ route ('files.download-csv', 'title_only')}}"><button class="btn btn--download">Download</button></a>
            </div>
            <div class="file-item">
                <small class="text-small">Author Only</small>
                <a href="{{ route ('files.download-csv', 'author_only')}}"><button class="btn btn--download">Download</button></a>
            </div>
        </div>
        <div class="file-item-container">
            <div class="file-item">
                <h3 class="header header--title">Download as XML</h3>
                <small class="text-small">Author and Title</small>
                <a href="{{ route ('files.download-xml', 'all_data')}}"><button class="btn btn--download">Download</button></a>
            </div>
            <div class="file-item">
                <small class="text-small">Title Only</small>
                <a href="{{ route ('files.download-xml', 'title_only')}}"><button class="btn btn--download">Download</button></a>
            </div>
            <div class="file-item">
                <small class="text-small">Author Only</small>
                <a href="{{ route ('files.download-xml', 'author_only')}}"><button class="btn btn--download">Download</button></a>
            </div>
        </div>
    </div>
@endsection
