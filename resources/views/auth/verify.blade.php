@extends('layouts.app')
@section('nav')
    @include('partials.nav')
@endsection
@section('content')
<div class="flex items-center py-16">
    <div class="md:w-1/2 md:mx-auto m-4">
        <div class="rounded shadow">
            <div class="font-medium text-lg text-white bg-black p-4 rounded-t">
                {{ __('auth.Verify your Email Address') }}
            </div>
            <div class="bg-white p-4 rounded-b">
                @if (session('resent'))
                    <div class="bg-white border border-blue-light text-blue-dark text-base px-4 py-3 rounded mb-4">
                        ระบบได้ส่งข้อความเพื่อการยืนยันการสมัครสมาชิกไปยังอีเมลที่คุณใช้ในการลงทะเบียนแล้ว.
                    </div>
                @endif

                <p class="text-gray-darkest">
                    {{ __('คุณยังไม่ได้ยืนยันที่อยู่อีเมล , กรุณาตรวจสอบข้อความในกล่องจดหมายที่ระบบได้ส่งไปเพื่อยืนยันความถูกต้องของทีอยู่อีเมล ที่คุณใช้ในการลงทะเบียน') }}
                    {{ __('ถ้าหากคุณยังไม่ได้รับอีเมลจากเรา ') }},
                    <a href="{{ route('verification.resend') }}"
                    class="no-underline text-blue hover:text-mstore ">
                    คลิกที่นี่ เพื่อส่งข้อความยืนยันอีกครั้ง</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
