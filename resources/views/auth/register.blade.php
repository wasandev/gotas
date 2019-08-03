@extends('layouts.app')


@section('content')

@include('partials.header')

<form
    class="bg-white shadow-md rounded-lg p-4 max-w-login mx-auto"
    method="POST" action="{{ route('register') }}">

    {{ csrf_field() }}
    @component('partials.heading')
        {{ __('auth.register') }}
    @endcomponent
    @if ($errors->any())
    <p class="text-center font-semibold text-red my-3">
        @if ($errors->has('name'))
            {{ $errors->first('name') }}
        @elseif ($errors->has('email'))
            {{ $errors->first('email    ') }}
        @elseif ($errors->has('role'))
            {{ $errors->first('role') }}
        @elseif ($errors->has('terms'))
            {{ $errors->first('terms') }}
        @else
            {{ $errors->first('password') }}
        @endif
    </p>
    @endif
    <div class="mb-1 {{ $errors->has('name') ? ' has-error' : ''  }}">
        <label  class="block font-bold mb-1" for="name">{{ __('auth.name') }}</label>
        <input class="w-full px-4 h-10 border-2 focus:border-mstore rounded-lg bg-white text-grey-darker outline-none mb-3 border-grey-light" id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
    </div>

    <div class="mb-1 {{ $errors->has('email') ? ' has-error' :'' }}">
        <label class="block font-bold mb-1" for="email">{{ __('auth.email') }}</label>
        <input class="w-full px-4 h-10 border-2 focus:border-mstore rounded-lg bg-white text-grey-darker outline-none mb-3 border-grey-light " id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
    </div>

    <div class="flex mb-1 ">
        <div class="flex-1 mb-1 lg:w-1/2 mr-4 {{ $errors->has('password') ? 'has-error' : '' }}">
            <label class="block font-bold mb-1" for="password">{{ __('auth.password') }}</label>
            <input class="w-full px-4 h-10 border-2 focus:border-mstore rounded-lg bg-white text-grey-darker outline-none mb-3 border-grey-light" id="password" type="password" name="password" required>

        </div>

        <div class="flex-1 mb-1 lg:w-1/2  {{ $errors->has('password') ? 'has-error' : '' }}">
            <label class="block font-bold mb-1" for="password_confirmation" >{{ __('auth.Confirm Password') }}</label>
            <input class="w-full px-4 h-10 border-2 focus:border-mstore rounded-lg bg-white text-grey-darker outline-none mb-3 border-grey-light" id="password_confirmation" type="password" name="password_confirmation" required>

        </div>
    </div>


    <div class="flex mb-1">
        <label class="flex items-center block text-xl font-bold">
            <input class="" type="checkbox" name="terms" required>
        <a href="/terms" target="_blank" class="text-grey-darkest no-underline hover:text-mstore">
            <span class="text-sm ml-2">{{ __('auth.Agree To Terms') }}</span>
        </a>
        </label>

    </div>

    <div class="flex mb-1 p-2 text-center">
        <button class="w-full mx-2 btn btn-mstore btn-mstore:hover focus:outline-none" type="submit">
        {{ __('auth.register') }}
        </button>

    </div>

</form>

@endsection
