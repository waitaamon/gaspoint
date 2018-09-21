@extends('admin.layouts.default')

@section('admin.content')

    <div class="columns is-mobile">
        <div class="column is-11 is-offset-1">

            <h1 class="title">Edit Manager " {{ $manager->name }}"</h1>

            <form action=" {{ route('manager.update', $manager->id) }}" method="post" class="form">

                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <div class="field">
                    <label for="name" class="label">name</label>
                    <p class="control">
                        <input type="text" name="name" id="name" class="input {{ $errors->has('name') ? 'is-danger' : '' }}" value="{{ old('name')? old('name') : $manager->name }}">
                    </p>

                    @if($errors->has('name'))
                        <p class=" help is-danger"> {{ $errors->first('name') }}</p>
                    @endif
                </div>

                <div class="field">
                    <label for="phone" class="label">phone</label>
                    <p class="control">
                        <input type="text" name="phone" id="phone" class="input {{ $errors->has('phone') ? 'is-danger' : '' }}" value="{{ old('phone')? old('phone') : $manager->phone }}">
                    </p>

                    @if($errors->has('phone'))
                        <p class=" help is-danger"> {{ $errors->first('phone') }}</p>
                    @endif
                </div>

                <div class="field is-grouped">
                    <p class="control">
                        <button class="button is-primary">update manager</button>
                        <a class="button is-danger" onclick="event.preventDefault(); document.getElementById('delete').submit();">delete manager</a>
                    </p>
                </div>

            </form>
        </div>
    </div>

    <form id="delete" action="{{ route('manager.delete', $manager->id) }}" method="POST" class="is-hidden">
        {{ csrf_field() }}
    </form>

@endsection