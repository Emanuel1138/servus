
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite('resources/css/app.css') 
</head>
<body class="flex flex-row w-full  bg-slate-950 h-screen" style="background-image: url('/images/background.png'); background-size: cover; background-position: center;">

    <div class="w-[45%] h-[105vh] flex-col align-center bg-red-50 pb-10">
        <header class="logo w-full">
            <div class="p-[40px] pb-0">
                <img class="w-[140px]" src="{{ asset('images/logo.svg') }}" alt="">
            </div>
        </header>

        <div class="form-name w-full flex justify-center">
            <h1 class="font-robotoSerif font-medium text-xl">@yield('form-name')</h1>
        </div>

        <div class="form pt-[30px] w-full flex justify-center">

            <div class="flex-none w-[400px]">
                @yield('content')
            </div>
            
        </div>
    </div>

    <div class="w-[55%] flex justify-center items-center p-20 font-sourceSerif ">
        <div class="bg-red-50 p-10 w-[400px] rounded-lg shadow-lg">
            <p class="italic text-2xl mb-[30px]">“Os ministros devem desempenhar suas funções com sincera piedade e ordem, conforme as normas litúrgicas, evitando toda preferência pessoal.”</p>
            <p class="flex justify-end text-lg">IGMR, n. 94</p>
            
        </div>
    </div>
</body>
</html>
