@extends('layouts.main-home')

@section('container')

@if ($message = Session::get('status'))
<div class="text-white bg-green-500 rounded p-2 mb-2">{{ $message }}</div>
@endif
<div class="h-fit p-12">
    <div class="flex flex-col justify-center items-center">

    <div class="grid grid-cols-2 text-center w-full font-bold p-5">
        <p>@lang('index.account')</p>
        <p>@lang('index.action')</p>
    </div>

    <div class="grid grid-cols-2 text-center w-full border-2 border-red-300 py-4 px-2 gap-5">
        @foreach ($account as $item)
            <div class="text-center">
               @if ($item->role_id == '2' && $item->id == '1')
                <p>@lang('index.first') {{$item->id}} - Admin</p>
               @elseif ($item->role_id == '1' && $item->id == '1')
               <p>@lang('index.first') {{$item->id}} - User</p>
               @elseif ($item->role_id == '2')
                <p>@lang('index.account') {{$item->id}} - Admin</p>
               @elseif ($item->role_id == '1')
               <p>@lang('index.account') {{$item->id}} - User</p>
               @endif
            </div>
            <div class="flex justify-around items-center">
                @if ($item->id == Auth::user()->id)
                    <p class="opacity-25  px-4 py-2 rounded-md bg-blue-500 border-2 border-blue-400 duration-300 ease-in-out text-white pointer-events-none uppercase">@lang('index.update_role')</p>
                    <p class="opacity-25 px-4 py-2 hover:bg-red-600 rounded-md hover:text-white bg-red-500 border-2 hover:border-transparent border-red-400 duration-300 ease-in-out text-white pointer-events-none ">@lang('cart.DELETE')</p>
                @else
                    <a href="/update-role/{{$item->id}}" class="px-4 py-2 hover:bg-blue-600 rounded-md hover:text-white bg-blue-500 border-2 hover:border-transparent border-blue-400 duration-300 ease-in-out text-white uppercase">@lang('index.update_role')</a>
                    <form action="/delete/{{$item->id}}" enctype="multipart/form-data" method="post">
                        @csrf
                        {{method_field('DELETE')}}
                        <button class="px-4 py-2 hover:bg-red-600 rounded-md hover:text-white bg-red-500 border-2 hover:border-transparent border-red-400 duration-300 ease-in-out text-white ">@lang('cart.DELETE')</button>
                    </form>
                @endif
            </div>
        @endforeach
    </div>

    </div>
</div>


@endsection
