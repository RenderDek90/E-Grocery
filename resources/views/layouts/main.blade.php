<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Amazing E-Grocery</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <script src="https://cdn.tailwindcss.com"></script>


    </head>
    <body>
        <nav class="shadow-md p-5">
            <ul class="list-none flex flex-row justify-between items-center">
                <li class="font-medium text-red-400 text-2xl">Amazing E-Grocery</li>
                @if (Auth::check())

                <li><a href="/logout" class="px-4 py-2 bg-red-400 rounded-md text-white hover:bg-transparent border-2 border-transparent hover:border-red-400 duration-300 ease-in-out hover:text-red-600 ">{{__('login-form.title-logout')}}</a></li>
                @else
                <div class="grid grid-cols-2 gap-3">
                    <li><a href="/register" class="px-4 py-2 hover:bg-red-400 rounded-md hover:text-white bg-transparent border-2 hover:border-transparent border-red-400 duration-300 ease-in-out text-red-600 ">{{__('login-form.title-register')}}</a></li>
                    <li><a href="/login" class="px-4 py-2 hover:bg-red-400 rounded-md hover:text-white bg-transparent border-2 hover:border-transparent border-red-400 duration-300 ease-in-out text-red-600 ">{{__('login-form.title-login')}}</a></li>
                </div>
                @endif
            </ul>
        </nav>
        <section>
            @yield('container')
        </section>
        <footer class="bg-red-700 p-5 text-center text-white">
            <div class="flex flex-row justify-center gap-3">
                <p class="font-bold">{{__('footer.choose_language')}}</p>
                <form action="/setlang/en" method="post">
                @csrf
                    <button class="border-transparent duration-300 ease-in-out text-white font-bold rounded text-sm">EN</button>
                </form>
                <p>|</p>
                <form action="/setlang/id" method="post">
                    @csrf
                        <button class="border-transparent duration-300 ease-in-out text-white font-bold rounded text-sm">ID</button>
                    </form>
            </div>
            <p>&copy; Amazing E-Grocery 2023 | Darren Ezra</p>
        </footer>
    </body>
</html>
