
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite('resources/css/app.css') 
</head>
<body class="flex flex-row w-full h-screen bg-cover bg-center bg-slate-950" 
      style="background-image: url('/images/background.png');">

    <div class="w-[40%] h-full flex flex-col bg-red-50 pb-10">
        <header class="p-10 pb-0">
            <img class="w-36" src="{{ asset('images/logo.svg') }}" alt="">
        </header>

        <div class="flex flex-col justify-center flex-1">
            <h1 class="font-robotoSerif font-medium text-xl text-center">@yield('form-name')</h1>

            <div class="pt-8 flex justify-center">
                <div class="w-[400px]">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <div class="w-[60%] flex justify-center items-center p-20 font-sourceSerif">
        <div class="bg-red-50 p-10 w-[500px] h-[390px] rounded-lg shadow-lg">
            <p class="italic text-3xl mb-8">
                “Os ministros devem desempenhar suas funções com sincera piedade e ordem, conforme as normas litúrgicas, evitando toda preferência pessoal.”
            </p>
            <p class="flex justify-end text-lg">IGMR, n. 94</p>
        </div>
    </div>
</body>
</html>
