@extends('admin.layouts.default')

@section('admin.content')

    <div class="columns is-mobile">
        <div class="column is-11 is-offset-1">

            <h1 class="title">"{{ $admin->name }}" Account</h1>

            <form action=" {{ route('admin.update', $admin->id) }}" method="post" class="form">

                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <div class="field">
                    <label for="name" class="label">name</label>
                    <p class="control">
                        <input type="text" name="name" id="name" class="input {{ $errors->has('name') ? 'is-danger' : '' }}" value="{{ old('name')? old('name') : $admin->name }}">
                    </p>

                    @if($errors->has('name'))
                        <p class=" help is-danger"> {{ $errors->first('name') }}</p>
                    @endif
                </div>

                <div class="field">
                    <label for="email" class="label">email</label>
                    <p class="control">
                        <input type="email" name="email" id="email" class="input {{ $errors->has('email') ? 'is-danger' : '' }}" value="{{ old('email')? old('email') : $admin->email }}">
                    </p>

                    @if($errors->has('email'))
                        <p class=" help is-danger"> {{ $errors->first('email') }}</p>
                    @endif
                </div>

                <div class="field">
                    <label for="phone" class="label">phone</label>
                    <p class="control">
                        <input type="text" name="phone" id="phone" class="input {{ $errors->has('phone') ? 'is-danger' : '' }}" value="{{ old('phone')? old('phone') : $admin->phone }}">
                    </p>

                    @if($errors->has('phone'))
                        <p class=" help is-danger"> {{ $errors->first('phone') }}</p>
                    @endif
                </div>

                <div class="field is-grouped">
                    <p class="control">
                        <button class="button is-primary">update profile</button>
                    </p>
                </div>

            </form>
        </div>
    </div>

@endsection