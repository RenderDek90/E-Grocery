{{-- @dd() --}}

@extends('layouts.login-register')

@section('container')

<div class="p-5 h-fit w-80 bg-white/50 rounded-md shadow-lg shadow-red-600">
    <p class="font-medium text-red-700 text-2xl">{{__('login-form.title-login')}}</p>
    <div class="mt-2 mb-5 h-[2px] w-20 bg-red-800"></div>

    @if ($message = Session::get('message'))
        <div class="text-white bg-red-500 rounded p-2 mb-2">{{ $message }}</div>
@endif

    @if ($message = Session::get('status'))
        <div class="text-white bg-green-500 rounded p-2 mb-2">{{ $message }}</div>
    @endif
    <div>
        <form class="grid grid-cols-1 gap-2" action="/login" method="post">
            @csrf
        <label for="name"></label>
        <input class="px-2 py-2 rounded-md" type="text" name="email" id="email" placeholder="{{__('login-form.input.email')}}">

        <label for="password"></label>
        <input class="px-2 py-2 rounded-md" type="password" name="password" id="password" placeholder="{{__('login-form.input.Password')}}">

        <button class="mt-4 px-4 py-2 hover:bg-red-400 rounded-md hover:text-white bg-transparent border-2 hover:border-transparent border-red-400 duration-300 ease-in-out text-red-600 shadow-md hover:shadow-red-600 mb-4" type="submit" value="submit">{{__('login-form.input.LOGIN')}}</button>
        </form>

        <a href="/register" class="text-sm font-light hover:text-red-700 hover:underline">{{ __('login-form.input.click_register') }}</a>
    </div>
</div>

<div class="flex flex-row justify-center gap-3 p-5">
    <p class="font-medium text-white">{{__('footer.choose_language')}}</p>
    <form action="/setlang/en" method="post">
    @csrf
        <button class="border-transparent duration-300 ease-in-out text-white font-bold rounded text-sm  ">EN</button>
    </form>
    <p class="text-white">|</p>
    <form action="/setlang/id" method="post">
        @csrf
            <button class="border-transparent duration-300 ease-in-out text-white font-bold rounded text-sm ">ID</button>
        </form>
</div>

@endsection
