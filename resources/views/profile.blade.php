@extends('layouts.main-Home')

@section('container')

@if($errors->any())
<div class="bg-red-400 rounded p-5 mb-5">
    <ul class="grid grid-cols-2">
        @if ($errors->has('first_name'))
        <li class="text-white">{{ $errors->first('first_name') }}</li>
    @endif
    @if ($errors->has('last_name'))
    <li class="text-white">{{ $errors->first('last_name') }}</li>
    @endif

    @if ($errors->has('gender'))
    <li class="text-white">{{ $errors->first('gender') }}</li>
    @endif

    @if ($errors->has('image'))
    <li class="text-white">{{ $errors->first('image') }}</li>
    @endif

    @if ($errors->has('email'))
    <li class="text-white">{{ $errors->first('email') }}</li>
    @endif

    @if ($errors->has('password'))
    <li class="text-white">{{ $errors->first('password') }}</li>
    @endif

    @if ($errors->has('foo_confirmation'))
    <li class="text-white">{{ $errors->first('foo_confirmation') }}</li>
    @endif
    </ul>
</div>
@endif

@if ($message = Session::get('status'))
<div class="text-white bg-green-500 rounded p-2 mb-2">{{ $message }}</div>
@endif

<div class="flex flex-row justify-center items-center gap-5">
    <img src="{{url('storage/images/' . $account->display_picture_link)}}" alt="profile_picture" class="w-fit h-[400px] rounded-md shadow-md ">
    <form class="grid grid-cols-2 gap-2" action="/profile/{{Auth::id()}}" enctype="multipart/form-data" method="post">
        @csrf

    <label for="first_name">@lang('login-form.input.firstN')</label>
    <input class="px-2 py-2 rounded-md shadow-md border-2" type="text" name="first_name" id="first_name" placeholder="{{$account->first_name}}">

    <label for="last_name">@lang('login-form.input.lastN')</label>
    <input class="px-2 py-2 rounded-md shadow-md border-2" type="text" name="last_name" id="last_name" placeholder="{{$account->last_name}}">

    <label for="gender">@lang('login-form.input.Gender')</label>
    <div class="flex flex-row gap-2">
        @foreach ($gender as $item )
        @if ($item->gender_desc == 'Male')
        <input type="radio" name="gender">{{__('login-form.input.gender_choice.male')}}
        @else
        <input type="radio" name="gender">{{__('login-form.input.gender_choice.female')}}
        @endif
        @endforeach
    </div>

    <label for="roles">@lang('login-form.input.Roles')</label>
    <select name="roles" id="roles" class="rounded py-2 shadow-md border-2" disabled>
        @if ($account->role_id == '1')
        <option value="1">User</option>
        @else
        <option value="2">Admin</option>
        @endif
    </select>

    <label for="image">@lang('login-form.input.Profile_Picture')</label>
    <input class="px-2 py-2 rounded-md shadow-md border-2" type="file" name="image" id="image">

    <label for="email">@lang('login-form.input.email')</label>
    <input class="px-2 py-2 rounded-md shadow-md border-2" type="text" name="email" id="email" placeholder="{{$account->email}}">

    <label for="password">@lang('login-form.input.Password')</label>
    <input class="px-2 py-2 rounded-md shadow-md border-2" type="password" name="password" id="password" placeholder="@lang('login-form.input.password_rules')" >

    <label for="password_confirmation">@lang('login-form.input.Confirm_Password')</label>
    <input class="px-2 py-2 rounded-md shadow-md border-2" type="password" name="password_confirmation" id="password_confirmation" placeholder="@lang('login-form.input.cpassword_rules')">

    <button class="col-span-2 w-80 mt-4 px-4 py-2 hover:bg-red-400 rounded-md hover:text-white bg-transparent border-2 hover:border-transparent border-red-400 duration-300 ease-in-out text-red-600 shadow-md hover:shadow-red-600" type="submit" value="submit">@lang('login-form.submit')</button>
    </form>

</div>


@endsection
