@extends('admin.layouts.default')

@section('admin.content')
    <div class="columns is-mobile">
        <div class="column is-11 is-offset-1">
            <h1 class="is-size-4 has-text-weight-semibold">New Message</h1>

            <hr>

            <form action=" {{ route('message.store') }}" method="post" class="form">

                {{ csrf_field() }}

                <div class="field">
                    <label for="manager" class="label">Station</label>
                    <p class="control">
                    <div class="select {{ $errors->has('station') ? 'is-danger' : '' }}">
                        <select name="station" id="station">
                            <option value="all">All Stations</option>
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

                <div class="field">
                    <label for="message" class="label">message</label>
                    <p class="control">
                        <textarea name="message" id="message" maxlength="160" class="input {{ $errors->has('message') ? 'is-danger' : '' }}" rows="10" value="{{ old('message') ? old('message') : '' }}"></textarea>
                    </p>

                    @if($errors->has('message'))
                        <p class=" help is-danger"> {{ $errors->first('message') }}</p>
                    @endif
                </div>

                <div class="field is-grouped">
                    <p class="control">
                        <button class="button is-primary">Send Message</button>
                    </p>
                </div>

            </form>
        </div>
    </div>

@endsection