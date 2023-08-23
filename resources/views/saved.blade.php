@extends('layouts.main')

@section('container')

<div class="h-screen flex items-center justify-center">
    <div class="text-2xl font-medium hover:bg-red-400 hover:text-white hover:scale-110 ease-in-out duration-500 rounded-md py-4 px-2 pointer-events-auto">
        <p class="font-bold text-3xl">Saved!!</p>

        <a href="/home/{{$account->role_id}}">Click Here to 'Home'</a>
    </div>

</div>
@endsection
