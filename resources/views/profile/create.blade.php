@extends('layouts.app')
@section('nav')
    @include('partials.nav')
    
@endsection

@section('title')

    <title>Create a Profile</title>

@endsection

@section('content')

    <form         
        class="w-full max-w-md bg-white shadow-md rounded-lg p-3 mx-auto py-4 mt-6 mb-6" 
            method="POST" action="/profile">
    
        {{ csrf_field() }}

        @component('partials.heading')  

            {{ __('auth.Profile') }}        
        
        @endcomponent
       
        <div class="w-1/2 flex-wrap items-center mx-auto rounded" >
                <div class="flex-1 items-center">
                <img  src="{{  Storage::url($user->avatar) }}">            
                <p class="text-center -mt-16 text-black font-semibold text-3xl">ID : {{ $user->id }}</p>
                </div>                
        </div>
        
            
        @if ($errors->any())
        <p class="text-center font-semibold text-red my-3">
            @if ($errors->has('first_name'))
                {{ $errors->first('first_name') }}
            @elseif ($errors->has('last_name'))
                {{ $errors->first('last_name') }}
            @elseif ($errors->has('mobile'))
                {{ $errors->first('mobile') }}
            @elseif ($errors->has('birthdate'))
                {{ $errors->first('birthdate') }}       
            @else
                {{ $errors->first('gender') }}           
            @endif
        </p>        
        @endif
           
        <div class="flex flex-wrap mt-8 ">               
            <!-- first_name Form Input -->
            <div class="w-full md:w-1/2 px-2 mb-2 md:mb-0 {{ $errors->has('first_name') ? ' has-error' : ''  }}">
                <label  class="block font-bold mb-1" for="first_name">{{ __('auth.First name') }}</label>
                <input class="w-full px-4 h-10 border-2 focus:border-mstore rounded-lg bg-white text-grey-darker outline-none mb-3 border-grey-light" id="first_name" type="text"  name="first_name" value="{{ old('first_name') }}" required autofocus>
            </div>
                

            <!-- last_name Form Input -->
            <div class="w-full md:w-1/2 px-2 mb-2 md:mb-0 {{ $errors->has('last_name') ? ' has-error' : ''  }}">
                <label  class="block font-bold mb-1" for="last_name">{{ __('auth.Last name') }}</label>
                <input class="w-full px-4 h-10 border-2 focus:border-mstore rounded-lg bg-white text-grey-darker outline-none mb-3 border-grey-light" id="last_name" type="text" name="last_name" value="{{ old('last_name') }}" required autofocus>
            </div>
        </div>    

        <!-- Mobile Form Input -->
    
        <div class="px-2 mb-2 md:mb-0  {{ $errors->has('mobile') ? ' has-error' : ''  }}">
            <label  class="block font-bold mb-1" for="mobile">{{ __('auth.Mobile No') }}</label>
            <input class="w-full px-4 h-10 border-2 focus:border-mstore rounded-lg bg-white text-grey-darker outline-none mb-3 border-grey-light" id="mobile" type="text" name="mobile" value="{{ old('mobile') }}"  autofocus>
        </div>
       

        <div class="flex flex-wrap ">       
            <!-- birthdate Form Input -->
            <div class="w-full md:w-1/2 px-2 mb-2 md:mb-0 {{ $errors->has('birthdate') ? ' has-error' : ''  }}">
                <label class="block font-bold mb-1" for="birthdate">{{__('auth.Birthdate')}}</label>
                <input class="w-full px-4 h-10 border-2 focus:border-mstore rounded-lg bg-white text-grey-darker outline-none mb-3 border-grey-light" id="birthdate" type="date"  name="birthdate" value="{{ old('birthdate') }}" autofocus required>
            </div>
            <!-- Gender Form Input -->
            <div class="w-full md:w-1/2 px-2 mb-2 md:mb-0  {{ $errors->has('gender') ? ' has-error' : ''  }}">
                <label class="block font-bold mb-1" for="birthdate">{{ __('auth.Gender') }}</label>
                <select class="w-full px-4 h-10 border-2 focus:border-mstore rounded-lg bg-white text-grey-darker outline-none mb-3 border-grey-light" id="gender" name="gender">            
                    <option value="{{old('gender')}}">
                        {{ ! is_null(old('gender')) ?
                        (old('gender') == 1 ? 'Male' :'Female')
                        : 'Please Choose One'}}</option>
                    <option value="1">Male</option>
                    <option value="0">Female</option>
                        
                </select>
                
            </div>
             
        </div>
        <button class= "items-center bg-mstore hover:bg-mstore-dark text-black font-bold py-4 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    {{ __('auth.Create') }}
        </button>
     
    
        
        

    </form>

           
@endsection

@section('footer')
    @include('partials.footer')
    
@endsection