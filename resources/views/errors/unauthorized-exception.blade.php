@extends('layouts.app')

@section('nav')
    @include('partials.nav')
@endsection


@section('title')

    <title>Unauthorized Exeption</title>

@endsection

@section('content')

    <div class="container max-w-2xl mx-auto mt-8">
		
		<div class="mx-0 sm:mx-6">
			
			<div class="bg-white w-full p-4 md:p-12 text-lg md:text-2lg text-grey-darkest leading-normal" >
				<h2 class="text-red">No Way!</h2>
                <h3><i class="fa fa-warning text-red"></i> Oops! คุณไม่มีสิทธิ์ในการทำรายการนี้.</h3>

                    <p>
                        รายการนี่มีการจำกัดสิทธิ์การใช้งาน <a href="/">กลับสู่หน้าหลัก</a>.
                    </p>


            </div>
        </div>
           

    </div>

@endsection

@section('footer')
    @include('partials.footer')
    
@endsection