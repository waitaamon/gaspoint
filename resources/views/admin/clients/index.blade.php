@extends('admin.layouts.default')

@section('admin.content')

    <div class="columns is-mobile">
        <div class="column is-three-fifths is-offset-one-fifth">
            <a class="button is-small is-fullwidth is-primary is-outlined"  href="{{ route('client.create') }}">Register New Client</a>
        </div>
    </div>

    <hr>

    <div class="columns">
        <div class="column is-12">
            {!! $dataTable->table() !!}
        </div>
    </div>

@endsection

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    {!! $dataTable->scripts() !!}
@endsection