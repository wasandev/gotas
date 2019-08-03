@extends('layouts.app')



@section('content')

@include('partials.header')


<form class="bg-white shadow-md rounded-lg p-4 max-w-login mx-auto" method="POST" action="{{ route('password.email') }}">
    
    {{ csrf_field() }}

    @component('partials.heading')
        {{ __('auth.forgot your password?') }}
    @endcomponent

    @if (session('status'))
        <div class="text-red text-center font-semibold my-3">
            {{ session('status') }}
        </div>
    @endif
    
    @include('partials.errors')

    <div class="mb-6 {{ $errors->has('email') ? ' has-error' : '' }}">
        <label class="block font-bold mb-2" for="email">{{ __('auth.email') }}</label>
        <input class="w-full px-4 h-10 border-2 focus:border-mstore rounded-lg bg-white text-grey-darker outline-none mb-3 border-grey-light" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
    </div>

    <button  class="w-full bg-mstore hover:bg-mstore-dark text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
        {{ __('passwords.Send Password Reset Link') }}
    </button>
</form>
@endsection
