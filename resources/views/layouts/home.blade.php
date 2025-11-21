<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite('resources/css/app.css') 
</head>
<body class="bg-red-50">
    <header>
        <nav class="navbar flex justify-between pt-[20px] pr-[15%] pl-[15%]">
            <div class="logo">
                <a href="{{ route('welcome') }}"><img class="w-[170px]" src="{{ asset('images/logo.svg') }}" alt="Logo"></a>
            </div>
            <ul class="nav-links flex gap-[30px] items-center">
                <li><a href="" class="hover:underline">Início</a></li>
                <li><a href="" class="hover:underline">funcionalidades</a></li>
                <li><a href="" class="hover:underline">Sobre</a></li>
            </ul>
            <div class="login-signup flex items-center gap-4">
                <button class="border border-transparent text-black px-4 py-2 rounded-3xl hover:border-black transition">
                    <a href="{{ route('login') }}">Login</a>
                </button>
                <button class="border-transparent border bg-black text-red-50 rounded-3xl font-semibold px-6 py-2 hover:bg-red-50 hover:border hover:border-black  hover:text-black transition">
                     <a href="{{ route('register') }}">Começar Agora</a>
                </button>
            </div>
        </nav> 
    </header>
     
    <div class="hero">

    </div>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2025 Servus</p>
    </footer>
</body>
</html>
