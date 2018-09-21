@extends('admin.layouts.default')

@section('admin.content')

    <div class="columns is-mobile">
        <div class="column is-11 is-offset-1">

            <h1 class="title">Message</h1>

            <hr/>
            <div class="columns">
                @foreach($message->stations as $station)
                    <div class="column is-2">
                        <p># {{ $station->name }}</p>
                    </div>
                @endforeach

            </div>
            <hr>
            <div class="control">
                <textarea class="textarea" type="text" disabled style="resize: none">{{ $message->message }}</textarea>
            </div>

            <hr>

            <div class="field is-grouped">
                <p class="control">
                    <a class="button is-danger" onclick="event.preventDefault(); document.getElementById('delete').submit();">delete message</a>
                </p>
            </div>


        </div>
    </div>

    <form id="delete" action="{{ route('message.delete', $message->id) }}" method="POST" class="is-hidden">
        {{ csrf_field() }}
    </form>

@endsection