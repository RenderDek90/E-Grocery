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
    <body class="h-screen bg-gradient-to-r from-red-300 to-red-500 flex flex-col justify-center items-center">
        <section class="p-5">
            @yield('container')
        </section>
    </body>
</html>
