@extends('layouts.main')

@section('container')

<div class="h-screen flex items-center justify-center">
    <div class="text-2xl font-medium hover:border-red-500 hover:border-2 hover:scale-110 ease-in-out duration-500 rounded-md py-4 px-2 pointer-events-auto">
        <p class="font-bold text-3xl">@lang('success.success')</p>
        <p class="font-light text-md">@lang('success.contactyou')</p>

        <a href="/home/{{$account->role_id}}" class="text-sm underline text-red-500">@lang('success.gobackhome')</a>
    </div>

</div>
@endsection
