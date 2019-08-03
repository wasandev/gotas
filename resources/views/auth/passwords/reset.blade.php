@extends('layouts.app')

@section('content')
@include('partials.header')

    <form class="bg-white shadow-md rounded-lg p-4 max-w-login mx-auto" method="POST" action="{{ route('password.request') }}">
        
        {{ csrf_field() }}

        @component('partials.heading')
        {{ __('passwords.Reset Password') }}
        @endcomponent

        @include('partials.errors')

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="mb-6 {{ $errors->has('email') ? ' has-error' : '' }}">
            <label class="block font-bold mb-2" for="email">{{ __('auth.email') }}</label>
            <input class="w-full px-4 h-10 border-2 focus:border-mstore rounded-lg bg-white text-grey-darker outline-none mb-3 border-grey-light" id="email" type="email" name="email" value="{{ $email or old('email') }}" required autofocus>
            
        </div>

        <div class="mb-6 {{ $errors->has('password') ? ' has-error' : '' }}">
            <label class="block font-bold mb-2" for="password">{{ __('auth.password') }}</label>
            <input class="w-full px-4 h-10 border-2 focus:border-mstore rounded-lg bg-white text-grey-darker outline-none mb-3 border-grey-light" id="password" type="password" name="password" required>           
        </div>

        <div class="mb-6 {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <label class="block font-bold mb-2" for="password_confirmation" >{{ __('auth.Confirm Password') }}</label>
            <input class="w-full px-4 h-10 border-2 focus:border-mstore rounded-lg bg-white text-grey-darker outline-none mb-3 border-grey-light" id="password_confirmation" type="password"  name="password_confirmation" required>
        </div>

        <button class="w-full bg-mstore hover:bg-mstore-dark text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" >
                    {{ __('passwords.Reset Password') }}
        </button>
        
    </form>
            
@endsection
