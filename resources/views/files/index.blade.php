@extends('common.layouts.main')

@section('content')
    <div class="files-container">
        <div class="file-item-container">
            <h3 class="header header--title">Download as CSV</h3>
            <small class="text-small">All 3 formats are included in the spreadsheet</small>
            <button class="btn btn--download"><a href="{{ route ('files.download-csv')}}">Download</a></button>
        </div>
        <div class="file-item-container">
            <h3 class="header header--title">Download as XML</h3>
            <small class="text-small">All 3 formats are included in the spreadsheet</small>
            <button class="btn btn--download"><a href="{{ route ('files.download-xml')}}">Download</a></button>
        </div>
    </div>
@endsection
