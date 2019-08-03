@extends('layouts.app')
@section('nav')
  @include('partials.nav')    
@endsection

@section('title')

    <title>Profile</title>

@endsection

@section('content')
      
       
        
         
    <div class="w-full max-w-md bg-white shadow-md rounded-lg p-3 mx-auto py-4 mt-6 mb-6" >
        @component('partials.heading')  
            {{ __('auth.Profile') }}        
        @endcomponent
        
        <div class="w-full flex-wrap">
            
            <div class="flex-1 mx-auto items-center">
                <img src="{{  Storage::url($user->avatar) }}">            
                <p class="text-center -mt-16 text-white font-semibold text-3xl">ID : {{ $user->id }}</p>
            </div>                        
            
            
            <div class="border-r border-b border-l border-grey-light lg:border-l-0 lg:border-t lg:border-grey-light bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                <div class="mb-8">
                <p class="text-sm text-grey-dark flex items-center">
                    <svg class="fill-current text-grey w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M5 5a5 5 0 0 1 10 0v2A5 5 0 0 1 5 7V5zM0 16.68A19.9 19.9 0 0 1 10 14c3.64 0 7.06.97 10 2.68V20H0v-3.32z"/>
                    </svg>
                    Member id : {{ $user->id }}
                </p>
                <div class="text-black font-bold text-xl mb-2">{{ $profile->fullname() }}</div>
                <p class="text-grey-darker text-base"></p>
                </div>
                <div class="flex items-center">
                    <img class="w-10 h-10 rounded-full mr-4" src="{{ Storage::url($user->avatar) }}" alt="Your Avatar">
                    <div class="text-sm">
                        <p class="text-black leading-none">Nobile : {{ $profile->mobile }}</p>
                        <p class="text-grey-dark">{{ $profile->showGender($profile->gender) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')

    <script>
    
        function ConfirmDelete()
        {
            var x = confirm("Are you sure you want to delete?");
            return x;
        }
        
    </script>
    
@endsection