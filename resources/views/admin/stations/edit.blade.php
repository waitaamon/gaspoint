@extends('admin.layouts.default')

@section('admin.content')

    <div class="columns is-mobile">
        <div class="column is-11 is-offset-1">

            <h1 class="title">Edit Station " {{ $station->name }}"</h1>

            <form action=" {{ route('station.update', $station->id) }}" method="post" class="form">

                {{ csrf_field() }}
                {{ method_field('PATCH') }}


                <div class="field">
                    <label for="name" class="label">name</label>
                    <p class="control">
                        <input type="text" name="name" id="name" class="input {{ $errors->has('name') ? 'is-danger' : '' }}" value="{{ old('name')? old('name') : $station->name }}">
                    </p>

                    @if($errors->has('name'))
                        <p class=" help is-danger"> {{ $errors->first('name') }}</p>
                    @endif
                </div>

                <div class="field">
                    <label for="phone" class="label">phone</label>
                    <p class="control">
                        <input type="text" name="phone" id="phone" class="input {{ $errors->has('phone') ? 'is-danger' : '' }}" value="{{ old('phone')? old('phone') : $station->phone }}">
                    </p>

                    @if($errors->has('phone'))
                        <p class=" help is-danger"> {{ $errors->first('phone') }}</p>
                    @endif
                </div>
                <div class="field">
                    <label for="manager" class="label">manager</label>
                    <p class="control">
                    <div class="select {{ $errors->has('manager') ? 'is-danger' : '' }}">
                        <select name="manager" id="manager">
                            <option value="{{ $station->user->id }}">{{ $station->user->name }}</option>
                            @foreach($managers as $manager)
                                <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    </p>
                    @if($errors->has('manager'))
                        <p class=" help is-danger"> {{ $errors->first('manager') }}</p>
                    @endif
                </div>

                <div class="field is-grouped">
                    <p class="control">
                        <button class="button is-primary">update station</button>
                        <a class="button is-danger" onclick="event.preventDefault(); document.getElementById('delete').submit();">delete station</a>
                    </p>
                </div>

            </form>
        </div>
    </div>

    <form id="delete" action="{{ route('station.delete', $station->id) }}" method="POST" class="is-hidden">
        {{ csrf_field() }}
    </form>

@endsection