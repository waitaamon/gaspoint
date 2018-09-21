@extends('admin.layouts.default')

@section('admin.content')

    <div class="columns is-mobile">
        <div class="column is-11 is-offset-1">

            <h1 class="title">Edit Station Client</h1>

            <form action=" {{ route('client.update', $client->id) }}" method="post" class="form">

                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <div class="field">
                    <label for="phone" class="label">phone</label>
                    <p class="control">
                        <input type="text" name="phone" id="phone" class="input {{ $errors->has('phone') ? 'is-danger' : '' }}" value="{{ old('phone')? old('phone') : $client->phone }}">
                    </p>

                    @if($errors->has('phone'))
                        <p class=" help is-danger"> {{ $errors->first('phone') }}</p>
                    @endif
                </div>

                <div class="field">
                    <label for="manager" class="label">station</label>
                    <p class="control">
                    <div class="select {{ $errors->has('station') ? 'is-danger' : '' }}">
                        <select name="station" id="station">
                            <option value="{{ $client->station->id }}">{{ $client->station->name }}</option>
                            @foreach($stations as $station)
                                <option value="{{ $station->id }}">{{ $station->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    </p>
                    @if($errors->has('station'))
                        <p class=" help is-danger"> {{ $errors->first('station') }}</p>
                    @endif
                </div>

                <div class="field is-grouped">
                    <p class="control">
                        <button class="button is-primary">update client</button>
                        <a class="button is-danger" onclick="event.preventDefault(); document.getElementById('delete').submit();">delete client</a>
                    </p>
                </div>

            </form>
        </div>
    </div>

    <form id="delete" action="{{ route('client.delete', $client->id) }}" method="POST" class="is-hidden">
        {{ csrf_field() }}
    </form>

@endsection