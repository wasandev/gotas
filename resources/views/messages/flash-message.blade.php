@if ($message = Session::get('success'))

<div class="text-center mx-auto py-4 bg-blue-lightest border border-blue-light text-blue-dark px-4 py-3 rounded relative max-w-xl" role="alert">
  <strong class="font-bold">Success</strong>
  <span class="block sm:inline">{{ $message }}.</span>
  <span class="absolute pin-t pin-b pin-r px-4 py-3">
    <svg class="fill-current h-6 w-6 text-blue" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
  </span>
</div>
@endif


@if ($message = Session::get('error'))

<div class="text-center mx-auto py-4 bg-red-lightest border border-red-light text-red-dark px-4 py-3 rounded relative max-w-xl" role="alert">
  <strong class="font-bold">Error!</strong>
  <span class="block sm:inline">{{ $message }}.</span>
  <span class="absolute pin-t pin-b pin-r px-4 py-3">
    <svg class="fill-current h-6 w-6 text-red" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
  </span>
</div>


@endif


@if ($message = Session::get('warning'))
<div class="text-center mx-auto py-4 bg-orange-lightest border border-orange-light text-orange-dark px-4 py-3 rounded relative max-w-xl" role="alert">
  <strong class="font-bold">Warning!</strong>
  <span class="block sm:inline">{{ $message }}.</span>
  <span class="absolute pin-t pin-b pin-r px-4 py-3">
    <svg class="fill-current h-6 w-6 text-orange" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
  </span>
</div>
@endif


@if ($message = Session::get('info'))
<div class="text-center mx-auto py-4 bg-green-lightest border border-green-light text-green-dark px-4 py-3 rounded relative max-w-xl" role="alert">
  <strong class="font-bold">Info</strong>
  <span class="block sm:inline">{{ $message }}.</span>
  <span class="absolute pin-t pin-b pin-r px-4 py-3">
    <svg class="fill-current h-6 w-6 text-green" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
  </span>
</div>
@endif


@if ($errors->any())
<div class="text-center mx-auto py-4 bg-red-lightest border border-red-light text-red-dark px-4 py-3 rounded relative max-w-xl" role="alert">
  <strong class="font-bold">มีข้อผิดพลาด!</strong>
  <span class="block sm:inline">กรุณาตรวจสอบแบบฟอร์มด้านล่าง</span>
  <span class="absolute pin-t pin-b pin-r px-4 py-3">
    <svg class="fill-current h-6 w-6 text-red" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
  </span>
</div>

@endif