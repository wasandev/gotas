@extends('layouts.app')

@section('nav')
  @include('partials.tenant-nav')
@endsection

@section('content')
    <!--image-->
    <div class="w-full max-w-4xl  mx-auto bg-white  bg-cover"  style="background-image:url('{{  Storage::url($company->imagefile ) }}'); height: 75vh;">
    </div>
    <div class="max-w-3xl mx-auto -mt-16">
      <div class="mx-0 sm:mx-6">
        <div class=" bg-indigo-darker bg-transparent w-full p-4 md:p-4 t text-white leading-normal rounded-lg" style="opacity: .75;" >
              <p class="text-2xl md:text-3xl text-center ">
               {{ $company->company_name }} ยินดีต้อนรับ

              </p>
              <p class="py-2 text-base text-white text-center mt-4">
                {{ $company->description }}
              </p>
          </div>
      </div>
    </div>

    <div class="flex flex-wrap max-w-3xl mx-auto my-8">

            <div class="w-full md:w-1/3  flex flex-col rounded-lg ">
                <a href="#" class=" flex flex-col flex-1 rounded shadow hover:shadow-lg translateY-2px m-6 no-underline transition" >

                    <div class="aspect-16x9 rounded-t-lg" style="background:url('{{  Storage::url('services.jpg') }}') no-repeat center center/cover"></div>
                    <div class="p-6 flex flex-col flex-1 bg-indigo-darker text-center">
                        <h2 class="mb-3 text-white text-xl">บริการของเรา</h2>
                        <p class="text-white mb-6 text-sm">บริการขนส่งขนส่งสินค้าทั่วประเทศ</p>

                        <div class="mb-4 w-full mx-auto text-center text-sm">
                            <button class="w-1/2 btn btn-mstore btn-mstore:hover focus:outline-none"  >
                                ดูรายละเอียด
                            </button>
                        </div>

                    </div>
                </a>
            </div>

            <div class="w-full md:w-1/3  flex flex-col  ">
                <a href="#" class=" flex flex-col flex-1 rounded shadow hover:shadow-lg translateY-2px m-6 no-underline transition" >

                    <div class="aspect-16x9 rounded-t-lg" style="background:url('{{  Storage::url('trnprice.jpg') }}') no-repeat center center/cover"></div>
                    <div class="p-6 flex flex-col flex-1 bg-indigo-darker text-center">
                        <h2 class="mb-3 text-white text-xl">Prices</h2>
                        <p class="text-white mb-6 text-sm">ราคาถูก บริการดี</p>
                        <div class="mb-4 w-full mx-auto text-center text-sm">
                            <button class="w-1/2 btn btn-mstore btn-mstore:hover focus:outline-none"  >
                                ดูรายละเอียด
                            </button>
                        </div>
                    </div>
                </a>
            </div>

            <div class="w-full md:w-1/3  flex flex-col  ">
                <a href="#" class=" flex flex-col flex-1 rounded shadow hover:shadow-lg translateY-2px m-6 no-underline transition" >

                    <div class="aspect-16x9 rounded-t-lg" style="background:url('{{  Storage::url('blog.jpg') }}') no-repeat center center/cover"></div>
                    <div class="p-6 flex flex-col flex-1 bg-indigo-darker text-center">
                        <h2 class="mb-3 text-white text-xl">Blog</h2>
                        <p class="text-white mb-6 text-sm">ข่าวสารบริการ</p>
                        <div class="mb-4 w-full mx-auto text-center text-sm">
                            <button class="w-1/2 btn btn-mstore btn-mstore:hover focus:outline-none"  >
                                ดูรายละเอียด
                            </button>
                        </div>
                    </div>
                </a>
            </div>


    </div>




@endsection

@section('footer')
    @include('partials.footer')
@endsection
