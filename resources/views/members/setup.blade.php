@extends('layouts.app')

@section('content')
@include('partials.header')


<form class="bg-white shadow-md rounded-lg p-4 max-w-sm mx-auto"   action="{{ route('setup') }}"
  method="POST" >

    {{ csrf_field() }}

    @component('partials.heading')
        Application Setup
    @endcomponent
    @if ($errors->any())
    <p class="text-center font-semibold text-red my-3">
        @if ($errors->has('subdomain'))
            {{ $errors->first('subdomain') }}
        @elseif ($errors->has('company_name'))
            {{ $errors->first('company_name') }}
        @elseif ($errors->has('phoneno'))
            {{ $errors->first('phoneno') }}
        @else
            {{ $errors->first('taxtid') }}

        @endif
    </p>
    @endif

    <div class="flex mb-1 ">
        <div class="flex-1 mb-1 lg:w-1/2 mr-0 {{ $errors->has('subdomain') ? ' has-error' : ''  }}">
                <label  class="block font-base mb-1" for="subdomain">Subdomain</label>
                <input class="w-full px-1 h-10 border-2 focus:border-mstore rounded-lg bg-white text-grey-darker font-bold outline-none mb-3 border-grey-light"
                id="subdoname"
                type="text"
                name="subdomain"
                value="{{ old('subdoname') }}"
                placeholder="ระบุ Subdomain(8ตัวอักษร)"
                required autofocus>
            </div>
        <div class="flex-1 mb-1 mt-2 lg:w-1/2 mr-1 text-lg ">
            <span class="block text-left bg-white text-gray-dark text-sm">
            <br/>
            </span>

            <span class="text-left bg-white text-blue-darkest font-bold text-xl outline-none">
            .gotas.online
            </span>
        </div>
    </div>
    <div class="mb-1 {{ $errors->has('company_name') ? ' has-error' : ''  }}">
        <label  class="block font-base mb-1" for="company_name">ชื่อบริษัท,ห้าง,ชื่อผู้ประกอบการ</label>
        <input class="w-full px-4 h-10 border-2 focus:border-mstore rounded-lg bg-white text-grey-darker outline-none mb-3 border-grey-light"
        id="company_name"
        type="text"
        name="company_name"
        value="{{ old('company_name') }}"
        placeholder="ชื่อบริษัท ห้าง.."
        required autofocus>
    </div>

   <div class="mb-1 {{ $errors->has('phoneno') ? ' has-error' : ''  }}">
        <label  class="block font-base mb-1" for="phoneno">หมายเลขโทรศัพท์</label>
        <input class="w-full px-4 h-10 border-2 focus:border-mstore rounded-lg bg-white text-grey-darker outline-none mb-3 border-grey-light"
        id="phoneno"
        type="text"
        name="phoneno"
        value="{{ old('phoneno') }}"
        placeholder="โปรดป้อนหมายเลขโทรศัพท์"
        required autofocus>
    </div>
    <div class="mb-1 {{ $errors->has('taxid') ? ' has-error' : ''  }}">
        <label  class="block font-base mb-1" for="taxid">เลขประจำตัวผู้เสียภาษี</label>
        <input class="w-full px-4 h-10 border-2 focus:border-mstore rounded-lg bg-white text-grey-darker outline-none mb-3 border-grey-light"
        id="taxid"
        type="text"
        name="taxid"
        value="{{ old('taxid') }}"
        placeholder="โปรดป้อนเลขประจำตัวผู้เสียภาษี 13 หลัก"
        required autofocus>
    </div>

    <div class="flex mb-1 p-2 text-center">
        <button class="w-full items-center mx-2 btn btn-mstore btn-mstore:hover focus:outline-none" type="submit">
            สร้าง Application
        </button>

    </div>


</form>

@endsection
