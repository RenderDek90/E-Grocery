@extends('layouts.main-home')

@section('container')
<div class="h-fit p-12">

    <div class="font-bold text-2xl ">
        @if ($item->role_id == '2' && $item->id == '1')
        <p>First {{$item->id}} - Admin</p>
       @elseif ($item->role_id == '1' && $item->id == '1')
       <p>First {{$item->id}} - User</p>
       @elseif ($item->role_id == '2')
        <p>Account {{$item->id}} - Admin</p>
       @elseif ($item->role_id == '1')
       <p>Account {{$item->id}} - User</p>
       @endif
    </div>

    <div class="p-5">
        <div class="flex flex-row gap-5">
            <form action="/update-role/{{$item->id}}" enctype="multipart/form-data" method="post">
                @csrf
                <label for="roles" class="mr-5">Roles</label>
                <select name="roles" id="roles" class="rounded py-2 border-2 w-60">
                    @foreach ($roles as $item)
                        <option value="{{$item->role_name}}" class="py-2">{{$item->role_name}}</option>
                    @endforeach
                </select>
        </div>
    </div>
    <button class="col-span-2 mt-10 px-4 py-2 hover:bg-red-400 rounded-md hover:text-white bg-transparent border-2 hover:border-transparent border-red-400 duration-300 ease-in-out text-red-600 shadow-md hover:shadow-red-600" type="submit" value="submit">Save</button>
        </form>

</div>
@endsection
