@extends('admin.layouts.default')

@section('admin.content')

    Welcome to Gas Point, <strong>{{ auth()->user()->name }}</strong>

@endsection