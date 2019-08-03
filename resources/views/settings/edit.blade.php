@extends('layouts.app')

@section('title')

    <title>Edit Your User Settings</title>

@endsection

@section('content')

       


        <div class="pull-right">

            <a href="{{ route('password.request') }}">

                <button type="button" class="btn btn-lg btn-primary">

                    Reset Password

                </button>

            </a>

        </div>

        <h1 class="myTableFont">Update {{ $user->name }}</h1>

        <hr/>

        <form class="form" role="form" method="POST" action="{{ url('/settings') }}">

        {{ csrf_field() }}

        <!-- name Form Input -->

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                <label class="control-label">User Name</label>

                <input type="text" class="form-control" name="name" value="{{ $user->name }}">

                @if ($errors->has('name'))

                    <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
                </span>

                @endif

            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="control-label">E-Mail Address</label>

                <div>
                    <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}">

                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <!-- is_subscribed Form Input -->

            <div class="form-group{{ $errors->has('is_subscribed') ? ' has-error' : '' }}">

                <label class="control-label">Is Subscribed?</label>


                <select class="form-control" id="is_subscribed" name="is_subscribed">
                    <option value="{{ $user->is_subscribed }}">{{ $user->is_subscribed == 1 ? 'Yes' : 'No' }}</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>


                @if ($errors->has('is_subscribed'))

                    <span class="help-block">
                <strong>{{ $errors->first('is_subscribed') }}</strong>
                </span>

                @endif

            </div>

            <div class="form-group">

                <button type="submit" class="btn btn-primary btn-lg">

                    Update

                </button>

            </div>

        </form>



@endsection