<!DOCTYPE html> 
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite('resources/css/app.css') 
</head>
<body class="bg-white min-h-screen flex flex-col">

    <header class="bg-gray-100 p-[10px] pr-[20px] border-b border-gray-400 flex justify-between items-center relative">
        <div class="logo">
            <a href="{{ route('groups.index') }}"><img class="w-[130px]" src="{{ asset('images/logomarcablack.svg') }}" alt="Logo"></a>
        </div>

        <div class="profile-elements flex gap-[20px] items-center">

            <div class="messages-icon">
                <a href="#"><img class="w-[22px]" src="{{ asset('images/icons/Mail.svg') }}" alt="Mail"></a>
            </div>

            <div class="notifications-icon">
                <a href="#"><img class="w-[22px]" src="{{ asset('images/icons/Bell.svg') }}" alt="Notifications"></a>
            </div>

            <div id="userMenuButton" class="profile-icon rounded-full border-2 border-gray-700 cursor-pointer p-1">
                <img class="w-[22px]" src="{{ asset('images/icons/user.svg') }}" alt="User Profile">
            </div>

            <div id="userMenu" class="hidden absolute top-[70px] right-[20px] bg-white border border-gray-300 shadow-lg rounded-lg w-[180px] py-2 z-50">
                <a href="{{ route('profile.show') }}" class="block px-4 py-2 hover:bg-gray-100">Perfil</a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="w-full text-left px-4 py-2 hover:bg-gray-100">Logout</button>
                </form>
            </div>

        </div>
    </header>
    

    <main class="min-h-full bg-gray-200 ">
        
        @if(session('success'))
            <div id="flash-success" class="fixed top-4 right-4 z-50 w-[300px] transition-opacity duration-300">
                <div class="bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded shadow-lg flex justify-between items-start">

                    <span>{{ session('success') }}</span>

                    <button id="close-flash" class="text-green-700 font-bold hover:text-green-900 ml-3" aria-label="Fechar">
                        &times;
                    </button>
                </div>
            </div>

            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    const flash = document.getElementById("flash-success");
                    const btn = document.getElementById("close-flash");

                    if (btn) {
                        btn.addEventListener("click", () => {
                            flash.style.opacity = "0";
                        });
                    }
                });
            </script>
        @endif

        @yield('content')
    </main>

    <footer class="bg-gray-800 text-red-50 text-[15px] flex justify-between p-4">
        <div class="flex gap-4">
            <p>Política de Privacidade</p>
            <p>Termos de Uso</p>
        </div>
        <p>&copy 2025 Servus. Todos os direitos reservados.</p>
    </footer>

    <script>
        const button = document.getElementById('userMenuButton');
        const menu = document.getElementById('userMenu');

        button.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });

        document.addEventListener('click', (event) => {
            if (!button.contains(event.target) && !menu.contains(event.target)) {
                menu.classList.add('hidden');
            }
        });
    </script>

</body>
</html>
