{{-- @dd($account) --}}

@extends('layouts.login-register')

@section('container')

<div class="p-5 bg-white/50 rounded-md shadow-lg shadow-red-600">
    <div class="flex flex-row justify-between items-center">
        <p class="font-medium text-red-700 text-2xl">{{__('login-form.title-register')}}</p>
        <div class="flex flex-row justify-center gap-3">
            <form action="/setlang/en" method="post">
            @csrf
                <button class="border-transparent duration-300 ease-in-out text-red-700 hover:text-red-500 duration-300 ease-in-out font-bold rounded text-sm  ">EN</button>
            </form>
            <p class="text-red-700">|</p>
            <form action="/setlang/id" method="post">
                @csrf
                    <button class="border-transparent duration-300 ease-in-out text-red-700 hover:text-red-500 duration-300 ease-in-out font-bold rounded text-sm ">ID</button>
                </form>
        </div>

    </div>

    <div class="mt-2 mb-5 h-[2px] w-20 bg-red-800"></div>
    @if($errors->any())
    <div class="bg-white rounded p-5 mb-5">
        <ul class="grid grid-cols-2">
            @if ($errors->has('first_name'))
            <li class="text-red-800">{{ $errors->first('first_name') }}</li>
        @endif
        @if ($errors->has('last_name'))
        <li class="text-red-800">{{ $errors->first('last_name') }}</li>
        @endif

        @if ($errors->has('gender'))
        <li class="text-red-800">{{ $errors->first('gender') }}</li>
        @endif

        @if ($errors->has('roles'))
        <li class="text-red-800">{{ $errors->first('roles') }}</li>
        @endif

        @if ($errors->has('image'))
        <li class="text-red-800">{{ $errors->first('image') }}</li>
        @endif

        @if ($errors->has('email'))
        <li class="text-red-800">{{ $errors->first('email') }}</li>
        @endif

        @if ($errors->has('password'))
        <li class="text-red-800">{{ $errors->first('password') }}</li>
        @endif

        @if ($errors->has('foo_confirmation'))
        <li class="text-red-800">{{ $errors->first('foo_confirmation') }}</li>
        @endif
        </ul>
    </div>
    @endif

    <div>
        <form class="grid grid-cols-2 gap-2 items-center" action="/register" enctype="multipart/form-data" method="post">
            @csrf
        <label for="first_name">{{__('login-form.input.firstN')}}</label>
        <input class="px-2 py-2 rounded-md" type="text" name="first_name" id="first_name" value="{{ Cookie::get('mycookie') !== null ? Cookie::get('mycookie') : '' }}" placeholder="{{__('login-form.input.firstN')}}">

        <label for="last_name">{{__('login-form.input.lastN')}}</label>
        <input class="px-2 py-2 rounded-md" type="text" name="last_name" id="last_name" placeholder="{{__('login-form.input.lastN')}}">

        <label for="gender">{{__('login-form.input.Gender')}}</label>
        <div class="flex flex-row gap-2">
            @foreach ($gender as $item )
                @if ($item->gender_desc == 'Male')
                    <input type="radio" name="gender">{{__('login-form.input.gender_choice.male')}}
                @else
                <input type="radio" name="gender">{{__('login-form.input.gender_choice.female')}}
                @endif

            @endforeach
        </div>

        <label for="roles">{{__('login-form.input.Roles')}}</label>
        <select name="roles" id="roles" class="rounded py-2">
            @foreach ($roles as $item)
                <option value="{{$item->role_name}}" class="py-2">{{$item->role_name}}</option>
            @endforeach
        </select>

        <label for="image">{{__('login-form.input.Profile_Picture')}}</label>
        <input class="px-2 py-2 rounded-md" type="file" name="image" id="image">

        <label for="email">{{__('login-form.input.email')}}</label>
        <input class="px-2 py-2 rounded-md" type="text" name="email" id="email" placeholder="{{__('login-form.input.email_rules')}}">

        <label for="password">{{__('login-form.input.Password')}}</label>
        <input class="px-2 py-2 rounded-md" type="password" name="password" id="password" placeholder="{{__('login-form.input.password_rules')}}">

        <label for="password_confirmation">{{__('login-form.input.Confirm_Password')}}</label>
        <input class="px-2 py-2 rounded-md" type="password" name="password_confirmation" id="password_confirmation" placeholder="{{__('login-form.input.cpassword_rules')}}">

        <button class="col-span-2 mt-4 px-4 py-2 hover:bg-red-400 rounded-md hover:text-white bg-transparent border-2 hover:border-transparent border-red-400 duration-300 ease-in-out text-red-600 shadow-md hover:shadow-red-600 mb-4" type="submit" value="submit">{{__('login-form.input.REGISTER')}}</button>
        </form>
        <a href="/login" class="hover:underline text-sm hover:text-red-700">{{__('login-form.input.click_login')}}</a>
    </div>
</div>



@endsection
