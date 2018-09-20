@extends('admin.layouts.default')

@section('admin.content')

    @if($files->count())

        @each('admin.partials._file_updated_to_approve', $files, 'file')

    @else
        <p>There are no updated file to approve.</p>
    @endif
@endsection