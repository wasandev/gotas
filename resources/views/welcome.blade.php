@extends('layouts.app')
@section('nav')
@include('partials.nav')
@endsection


@section('content')

{{-- <!--image-->
<div class="max-w-full mx-auto bg-white bg-cover shadow-outline "
    style="background-image:url('{{  Storage::url('gotashome.jpg') }}'); height: 70vh;">

</div> --}}

<div class=" bg-black w-full p-4 md:p-12 text-white leading-normal" style="opacity: .65;">

    <!--Lead Para-->
    <p class="text-4xl md:text-4xl mb-2 text-center">
        Transportation Application Service
    </p>

    <p class="py-4 text-xl text-center text-gray-darkest mt-8 md:mt-12">
        แอปพลิเคชันบนคลาวด์ สำหรับการจัดการการขนส่ง <br />
        Cloud applications for Transportation Management
    </p>


</div>

<div class="flex flex-wrap max-w-wull mx-auto my-8">

    <div class="w-full md:w-1/2 lg:w-1/3 flex flex-col  ">
        <a href="/home"
            class=" flex flex-col flex-1 rounded shadow hover:shadow-lg translateY-2px m-6 no-underline transition">

            <div class="aspect-16x9 rounded-t-lg"
                style="background:url('{{  Storage::url('features.jpg') }}') no-repeat center center/cover"></div>
            <div class="p-6 flex flex-col flex-1 bg-white text-center">
                <h2 class="mb-3 text-grey-darkest text-xl">Features</h2>
                <p class="text-grey-darker mb-6 text-sm">มีฟังก์ชั่นการทำงานด้านการจัดการขนส่ง</p>

                <div class="mb-4 w-full mx-auto text-center text-sm">
                    <button class="w-1/2 btn btn-mstore btn-mstore:hover focus:outline-none">
                        ดูรายละเอียด
                    </button>
                </div>

            </div>
        </a>
    </div>

    <div class="w-full md:w-1/2 lg:w-1/3 flex flex-col  ">
        <a href="/prices"
            class=" flex flex-col flex-1 rounded shadow hover:shadow-lg translateY-2px m-6 no-underline transition">

            <div class="aspect-16x9 rounded-t-lg"
                style="background:url('{{  Storage::url('prices.jpg') }}') no-repeat center center/cover"></div>
            <div class="p-6 flex flex-col flex-1 bg-white text-center">
                <h2 class="mb-3 text-grey-darkest text-xl">Prices</h2>
                <p class="text-grey-darker mb-6 text-sm">ราคาถูก ไม่ต้องลงทุนพัฒนาโปรแกรมเอง ไม่ต้องลงทุนด้าน hardware
                </p>
                <div class="mb-4 w-full mx-auto text-center text-sm">
                    <button class="w-1/2 btn btn-mstore btn-mstore:hover focus:outline-none">
                        ดูรายละเอียด
                    </button>
                </div>
            </div>
        </a>
    </div>

    <div class="w-full md:w-1/2 lg:w-1/3 flex flex-col ">
        <a href="/blog"
            class=" flex flex-col flex-1 rounded shadow hover:shadow-lg translateY-2px m-6 no-underline transition">

            <div class="aspect-16x9 rounded-t-lg"
                style="background:url('{{  Storage::url('blog.jpg') }}') no-repeat center center/cover"></div>
            <div class="p-6 flex flex-col flex-1 bg-white text-center">
                <h2 class="mb-3 text-grey-darkest text-xl">Blog</h2>
                <p class="text-grey-darker mb-6 text-sm">บทความ/ข่าวสารที่น่าสนใจ</p>
                <div class="mb-4 w-full mx-auto text-center text-sm">
                    <button class="w-1/2 btn btn-mstore btn-mstore:hover focus:outline-none">
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
