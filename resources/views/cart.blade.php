{{-- @dd($orders) --}}

@extends('layouts.main')

@section('container')
@if (Auth::user()->role_id == '2')
@include('components.nav-admin')
@else
@include('components.nav-user')
@endif

@php
    $total_price = 0
@endphp
<div class="p-5">
    <p class="font-bold text-2xl py-2">Cart</p>

@if ($message = Session::get('status'))
<div class="text-white bg-green-500 rounded p-2">{{ $message }}</div>
@endif

</div>

<div class="p-12 flex flex-col justify-center items-center">
@foreach ($orders as $order)
    <div class="flex flex-row rounded justify-between gap-5 w-[90%] shadow-md items-center p-5">
        <img src="{{url('https://www.balicious.id/wp-content/uploads/2021/02/kangkung-kecil.jpg')}}" class="w-fit h-[100px]">
        <p class="font-medium text-xl">{{$order->item->item_name}}</p>
        <div class="flex flex-row gap-5 justify-center items-center">
            <p class="font-light text-xl">Rp.{{$order->price}}</p>
            <form action="/deleteCart/{{$order->id}}" enctype="multipart/form-data" method="post">
                @csrf
                <button class="text-xl px-4 py-2 hover:bg-red-600 rounded-md hover:text-white bg-red-500 border-2 hover:border-transparent border-red-400 duration-300 ease-in-out text-white ">@lang('cart.DELETE')</button>
            </form>

        </div>
    </div>

@php
$total_price += $order->price
@endphp

@endforeach

</div>

<div class="flex flex-col items-end gap-3 p-12 w-[90%]">
    <p>Total : Rp.{{$total_price}}</p>
    <form action="/checkout/{{Auth::id()}}" method="post">
    @csrf
        <button class="px-4 py-2 hover:bg-red-400 rounded-md hover:text-white bg-transparent border-2 hover:border-transparent border-red-400 duration-300 ease-in-out text-red-600 "type="submit">CHECK OUT</button>
    </form>
</div>




@endsection
