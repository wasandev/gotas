@extends('layouts.app')

@section('nav')
  @include('partials.member-nav')
@endsection

@section('content')
    <!--image-->
    <div class="w-full max-w-4xl mx-auto bg-white bg-cover "  style="background-image:url('{{  Storage::url('gotashome.jpg') }}'); height: 50vh;">
    </div>
    <div class="max-w-2xl mx-auto -mt-16">
      <div class="mx-0 sm:mx-6">
        <div class=" bg-blue bg-transparent w-full p-4 md:p-4 t text-white leading-normal rounded-lg" style="opacity: .75;" >
              <p class="text-2xl md:text-3xl text-center ">
                ยินดีต้อนรับเข้าสู่ระบบ GOTAS : Application สำหรับจัดการการขนส่ง

              </p>
              <p class="py-2 text-base text-white text-center mt-4">
                {{ $company }}
              </p>
          </div>
      </div>
    </div>



      <div class="w-full max-w-md mx-auto ">
          <a href="{{ 'http://'.$fqdn }}/app" target="_blank" class=" flex flex-col flex-1 hover:shadow-lg translateY-2px m-6 no-underline transition" >

              <div class="rounded-t-lg self-center" >
                  <svg class="fill-current text-center h-100 w-100 text-blue m-4" width="100" height="100"   xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path xmlns="http://www.w3.org/2000/svg" d="M10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20zM7 6v2a3 3 0 1 0 6 0V6a3 3 0 1 0-6 0zm-3.65 8.44a8 8 0 0 0 13.3 0 15.94 15.94 0 0 0-13.3 0z"/>
                   </svg>
              </div>
              <div class="p-6 flex flex-col flex-1 bg-white text-center">
                  <h2 class="mb-3 text-grey-darkest text-xl">จัดการ Application</h2>
                  <p class="text-grey-darker mb-6 text-sm">
                    url สำหรับเข้าใช้ Application :    {{ $fqdn }}
                    {{ config('nova.url') }}
                    {{ config('app.url') }}

                  </p>
                  <div class="mb-4 w-full mx-auto text-center text-sm">
                      <button class="w-1/2 btn btn-mstore btn-mstore:hover focus:outline-none"  >
                          เปิด Application
                      </button>
                  </div>
              </div>
          </a>
      </div>


@endsection

@section('footer')
    @include('partials.footer')
@endsection
