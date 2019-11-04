@extends('layouts.app')
@section('nav')
@include('partials.nav')
@endsection


@section('content')

<!--image-->
<div class="max-w-full mx-auto bg-white bg-cover "
    style="background-image:url('{{  Storage::url('gotashome.jpg') }}'); height: 75vh;">

    <div class="w-full max-w-screen-xl relative mx-auto px-6 pt-16 pb-40 md:pb-24">
        <div class="xl:flex -mx-6">
            <div class="max-w-2xl mx-auto p-4 md:p-4 t leading-normal">

                <h1 class="text-3xl text-black sm:text-4xl md:text-5xl xl:text-4xl font-light leading-tight">
                    จัดการการขนส่ง ให้เป็นเรื่องง่าย<br />
                    <span class="sm:block text-mstore-darker text-2xl font-normal">รู้รายได้ รู้ต้นทุน
                        ได้ทุกที่ทุกเวลาที่ต้องการ</span>
                </h1>
                <p class="mt-4 leading-relaxed sm:text-lg md:text-xl xl:text-lg text-grey-darker font-base">
                    GOTAS แอปพลิเคชันบนคลาวด์ สำหรับการจัดการการขนส่งที่ครอบคลุมทุกขั้นตอนของงานขนส่ง
                    รองรับงานขนส่งประเภทเหมาเที่ยวและประเภทศูนย์บริการรับ-ส่งสินค้า
                    ใช้งานง่ายทำงานได้ทุกที่ทุกเวลา...
                </p>
                <div class="flex mt-6 justify-start md:justify-center xl:justify-start">
                    <a href="/register"
                        class="rounded-lg px-4 md:px-5 xl:px-4 py-3 md:py-4 xl:py-3 bg-blue hover:bg-mstore md:text-lg xl:text-base text-white font-semibold leading-tight shadow-md">เริ่มเลย</a>
                    <a href="/feature"
                        class="ml-4 rounded-lg px-4 md:px-5 xl:px-4 py-3 md:py-4 xl:py-3 bg-white hover:bg-blue md:text-lg xl:text-base text-gray-800 font-semibold leading-tight shadow-md">ดูรายละเอียด</a>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="max-w-2xl mx-auto sm:-mt-2 md:-mt- 12 xl:-mt-16 ">
    <div class="mx-0 sm:mx-6">
        <div class=" bg-blue-light bg-transparent w-full p-4 md:p-4 t leading-normal rounded-lg" style="opacity: .80;">
            <p class="text-2xl md:text-3xl text-center text-black">

                Transportation Application Service
            </p>

            <p class="py-2 text-base text-white text-center mt-4">
                แอปพลิเคชันบนคลาวด์ สำหรับการจัดการการขนส่ง <br />
                Cloud applications for Transportation Management
            </p>

        </div>
    </div>
</div>

<div class="flex flex-wrap max-w-2xl mx-auto my-8">

    <div class="w-full md:w-1/2 lg:w-1/3 flex flex-col  ">
        <a href="/home"
            class=" flex flex-col flex-1 rounded shadow hover:shadow-lg translateY-2px m-6 no-underline transition">

            <div class="aspect-16x9 rounded-t-lg"
                style="background:url('{{  Storage::url('features.jpg') }}') no-repeat center center/cover">
            </div>
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
                style="background:url('{{  Storage::url('prices.jpg') }}') no-repeat center center/cover">
            </div>
            <div class="p-6 flex flex-col flex-1 bg-white text-center">
                <h2 class="mb-3 text-grey-darkest text-xl">Prices</h2>
                <p class="text-grey-darker mb-6 text-sm">ราคาถูก ไม่ต้องลงทุนพัฒนาโปรแกรมเอง
                    ไม่ต้องลงทุนด้าน hardware
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
                style="background:url('{{  Storage::url('blog.jpg') }}') no-repeat center center/cover">
            </div>
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
