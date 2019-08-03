@extends('layouts.app')

@section('nav')
    @include('partials.nav')
@endsection

@section('content')
    <!--Title-->
    <!--image-->
    <div class="container w-full max-w-4xl mx-auto bg-white bg-cover mt-0"  style="background-image:url('{{  Storage::url('mstore.jpg') }}'); height: 40vh;">
    </div> 
    
    <!--Container-->
	<div class="container max-w-2xl mx-auto -mt-16">
		
		<div class="mx-0 sm:mx-6">
			
			<div class="bg-white w-full p-4 md:p-12 text-lg md:text-2lg text-grey-darkest leading-normal" >
				
				
				<p class="text-2xl md:text-3xl mb-5">
                    
                    <svg class="fill-current h-6 w-6 mr-2" width="20" height="20"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 10V2l2-2h8l10 10-10 10L0 10zm4.5-4a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/></svg>
					 {{ __('Terms of services') }}
				</p>

                <p class="py-4">The basic blog page layout is available and all using the default Tailwind CSS classes (although there are a few hardcoded style tags). If you are going to use this in your project, you will want to convert the classes into components.</p>		
                
                <p class="py-4">The basic blog page layout is available and all using the default Tailwind CSS classes (although there are a few hardcoded style tags). If you are going to use this in your project, you will want to convert the classes into components.</p>

						
            </div>
        </div>
	</div>


@endsection
@section('footer')
    @include('partials.footer')
    
@endsection