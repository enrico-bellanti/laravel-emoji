<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title', 'Emoji')</title>
    </head>
    <body>
        {{-- HEADER --}}
        <header></header>
        {{-- /HEADER --}}

        {{-- MAIN --}}
        <main>
            @yield('main')
        </main>
        {{-- /MAIN --}}

        {{-- FOOTER --}}
        <footer></footer>
        {{-- /FOOTER --}}
    </body>
</html>