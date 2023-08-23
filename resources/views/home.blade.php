@extends('layouts.main')

@section('container')
@if (Auth::user()->role_id == '2')
@include('components.nav-admin')
@else
@include('components.nav-user')
@endif

<div class="p-12 grid grid-rows-2 gap-5 grid-cols-5 justify-center items-center">
@foreach ($item as $items )
    <div class="Card flex flex-col justify-center items-center bg-white rounded-md p-5 border-2 shadow-md w-full">
        <img src="{{url('https://www.balicious.id/wp-content/uploads/2021/02/kangkung-kecil.jpg')}}" class="w-fit self-baseline h-[100px]">
        <p class="mb-2 text-md self-baseline">{{$items->item_name}}</p>
        <a href="/item_detail/{{$items->id}}" class="bg-blue-500 text-white py-1 px-2 rounded-md text-sm w-full font-medium text-center hover:bg-blue-600 uppercase">@lang(__('home.detail'))</a>
    </div>
@endforeach
</div>

<div class="flex flex-row justify-center p-5 ">{{$item->withQueryString()->links()}}
</div>
@endsection
