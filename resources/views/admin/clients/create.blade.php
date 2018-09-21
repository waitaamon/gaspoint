@extends('admin.layouts.default')

@section('admin.content')
    <div class="columns is-mobile">
        <div class="column is-11 is-offset-1">
            <h1 class="is-size-4 has-text-weight-semibold">Register New Gas Point Client</h1>

            <hr>

            <form action=" {{ route('client.store') }}" method="post" class="form">

                {{ csrf_field() }}

                <div class="field">
                    <label for="phone" class="label">phone</label>
                    <p class="control">
                        <input type="text" name="phone" id="phone" class="input {{ $errors->has('phone') ? 'is-danger' : '' }}" value="{{ old('phone') ? old('phone') : '' }}">
                    </p>

                    @if($errors->has('phone'))
                        <p class=" help is-danger"> {{ $errors->first('phone') }}</p>
                    @endif
                </div>

                <div class="field">
                    <label for="manager" class="label">Station</label>
                    <p class="control">
                        <div class="select {{ $errors->has('station') ? 'is-danger' : '' }}">
                            <select name="station" id="station">
                                <option value="">Select Client Station</option>
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
                        <button class="button is-primary">Register Client</button>
                    </p>
                </div>

            </form>
        </div>
    </div>

@endsection