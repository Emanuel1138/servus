<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $formation->title }}</title>
    @vite('resources/js/app.js')
    @vite('resources/css/app.css') 
</head>
<body class="bg-gray-200">
<form action="{{ route('formations.update', $formation) }}" method="POST">
    @csrf
    @method('PUT')
    <header class="bg-gray-100 border-b border-gray-400 flex p-[10px] pl-[30px] items-center gap-4">
        <a href=""></a>
        <img class="w-[25px]" src="{{ asset('images/Arrow-left.svg') }}" alt="Logo">
        <div class="flex items-center ml-4">
            <input class="border-none bg-transparent text-[20px] rounded-[4px] p-1" type="text" value="{{ old('title', $formation->title) }}" name="title" id="title">
        </div> 
        <button type="submit" class="h-[40px] w-[40px] flex items-center justify-center rounded-[50px] bg-slate-300">
            <img class="w-[18px]" src="{{ asset('images/icons/Save.svg') }}" alt="Logo">
        </button>
    </header>
    <main class="flex flex-col items-center pl-[20px] pr-[20px] pt-[10px] gap-[10px]">
        @if(session('success'))
    <div id="flash-success" class="fixed top-4 right-4 z-50 w-[300px] transition-opacity duration-300">
        <div class="bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded shadow-lg flex justify-between items-start">
            <span>{{ session('success') }}</span>
            <button type="button" id="close-flash" class="text-green-700 font-bold hover:text-green-900 ml-3" aria-label="Fechar">&times;</button>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const flash = document.getElementById("flash-success");
            const btn = document.getElementById("close-flash");

            if (flash && btn) {
                btn.addEventListener("click", () => {
                    flash.style.opacity = "0";
                    setTimeout(() => flash.style.display = "none", 300);
                });

                setTimeout(() => {
                    flash.style.opacity = "0";
                    setTimeout(() => flash.style.display = "none", 300);
                }, 5000);
            }
        });
    </script>
@endif

        <div id="toolbar" class="ql-toolbar border-0 w-full bg-gray-100 rounded-2xl gap-[30px]">
            <select class="ql-header">
                <option value="1">Título 1</option>
                <option value="2">Título 2</option>
                <option selected>Normal</option>
            </select>

            <button class="ql-bold"></button>
            <button class="ql-italic"></button>
            <button class="ql-underline"></button>
            <button class="ql-strike"></button>

            <button class="ql-list" value="ordered"></button>
            <button class="ql-list" value="bullet"></button>

            <select class="ql-color"></select>
            <select class="ql-background"></select>

            <select class="ql-align">
                <option selected></option>
                <option value="center"></option>
                <option value="right"></option>
                <option value="justify"></option>
            </select>

            <button class="ql-clean"></button>
        </div>

        <div id="editor" class="bg-gray-100 w-[60%] h-64 border border-gray-400" data-initial="{{ old('body_html', $formation->body_html ?? '<p>Digite aqui...</p>') }}">
        </div>

        <input type="hidden" name="body_html" id="body_html">
        <input type="hidden" name="body_delta" id="body_delta">
    </main>
</form>
</body>
</html>
