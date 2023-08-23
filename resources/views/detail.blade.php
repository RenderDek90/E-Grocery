@extends('layouts.main')

@section('container')
@if (Auth::user()->role_id == '2')
@include('components.nav-admin')
@else
@include('components.nav-user')
@endif

<div class="p-12">
    @if ($message = Session::get('message'))
    <div class="text-white bg-green-500 rounded p-2 mb-2">{{ $message }}</div>
    @endif

    <p class="font-bold mb-5">{{$items->item_name}}</p>
    <div class="Card bg-white rounded-md p-5 border-2 shadow-md flex-row flex gap-5 justify-center">
        <img src="{{url('https://www.balicious.id/wp-content/uploads/2021/02/kangkung-kecil.jpg')}}" class="w-fit h-[400px]">
        <div class="flex flex-col justify-around">
            <p class="font-bold">Price : Rp.{{$items->price}}</p>
            <p class="font-light">{{$items->item_desc}}</p>
            <form action="/item_detail/{{$items->id}}" enctype="multipart/form-data" method="post">
                @csrf

                <button class="px-4 py-2 hover:bg-red-400 rounded-md hover:text-white bg-transparent border-2 hover:border-transparent border-red-400 duration-300 w-40 ease-in-out text-red-600" type="submit">BUY</button>
            </form>
        </div>
    </div>
</div>
@endsection
