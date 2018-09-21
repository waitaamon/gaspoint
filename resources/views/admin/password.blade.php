@extends('admin.layouts.default')

@section('admin.content')

    <div class="columns is-mobile">
        <div class="column is-11 is-offset-1">

            <h1 class="subtitle">Change Password</h1>

            <form action=" {{ route('admin.update.password') }}" method="post" class="form">

                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <div class="field">
                    <label for="current_password" class="label">current password</label>
                    <p class="control">
                        <input type="password" name="current_password" id="current_password" class="input {{ $errors->has('current_password') ? 'is-danger' : '' }}">
                    </p>

                    @if($errors->has('current_password'))
                        <p class=" help is-danger"> {{ $errors->first('current_password') }}</p>
                    @endif
                </div>

                <div class="field">
                    <label for="password" class="label">password</label>
                    <p class="control">
                        <input type="password" name="password" id="password" class="input {{ $errors->has('password') ? 'is-danger' : '' }}">
                    </p>

                    @if($errors->has('password'))
                        <p class=" help is-danger"> {{ $errors->first('password') }}</p>
                    @endif
                </div>

                <div class="field is-grouped">
                    <p class="control">
                        <button class="button is-primary">update password</button>
                    </p>
                </div>

            </form>
        </div>
    </div>

@endsection