<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite('resources/css/app.css') 
</head>
<body class="bg-red-50">

    <header class="p-[10px] pr-[20px] border-b border-gray-400 flex justify-between items-center">
        <div class="logo">
            <a href="{{ route('welcome') }}"><img class="w-[130px]" src="{{ asset('images/logomarcablack.svg') }}" alt="Logo"></a>
        </div>
        <div class="profile-elements flex gap-[20px] items-center">
            <div class="messages-icon">
                <a href="#"><img class="w-[22px]" src="{{ asset('images/icons/Mail.svg') }}" alt="Mail"></a>
            </div>
            <div class="notifications-icon">
                <a href="#"><img class="w-[22px]" src="{{ asset('images/icons/Bell.svg') }}" alt="Notifications"></a>
            </div>
            <div class="profile-icon rounded-[50px] border-2 border-gray-700">
                <a href="#"><img class="w-[22px]" src="{{ asset('images/icons/user.svg') }}" alt="User Profile"></a>
            </div>
        </div>
    </header>

    <main class="h-screen">
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-red-50 text-[15px] flex justify-between p-4">
        <div class="flex gap-4">
            <p>Política de Privacidade</p>
            <p>Termos de Uso</p>
        </div>
        <p>&copy 2025 Servus. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
