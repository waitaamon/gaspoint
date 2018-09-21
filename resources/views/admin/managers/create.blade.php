@extends('admin.layouts.default')

@section('admin.content')
    <div class="columns is-mobile">
        <div class="column is-11 is-offset-1">
            <h1 class="title">Register New Manager</h1>

            <form action=" {{ route('manager.store') }}" method="post" class="form">

                {{ csrf_field() }}

                <div class="field">
                    <label for="name" class="label">Name</label>
                    <p class="control">
                        <input type="text" name="name" id="name" class="input {{ $errors->has('name') ? 'is-danger' : '' }}" value="{{ old('name') ? old('name') : '' }}">
                    </p>

                    @if($errors->has('name'))
                        <p class=" help is-danger"> {{ $errors->first('name') }}</p>
                    @endif
                </div>

                <div class="field">
                    <label for="phone" class="label">phone</label>
                    <p class="control">
                        <input type="text" name="phone" id="phone" placeholder="eg 0722555666" class="input {{ $errors->has('phone') ? 'is-danger' : '' }}" value="{{ old('phone') ? old('phone') : '' }}">
                    </p>

                    @if($errors->has('phone'))
                        <p class=" help is-danger"> {{ $errors->first('phone') }}</p>
                    @endif
                </div>

                <div class="field is-grouped">
                    <p class="control">
                        <button class="button is-primary">Register Manager</button>
                    </p>
                </div>

            </form>
        </div>
    </div>

@endsection