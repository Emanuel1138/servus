<div class="bg-gray-100 w-64 h-screen flex flex-col border-r border-gray-400">
    <div class="p-6 border-b border-gray-400">
        <h1 class="font-sourceSerif text-xl font-semibold">{{ $group->parash }}</h1>
    </div>
    
    <nav class="flex flex-col gap-4 p-6">
        <a href="{{ route('dashboard', ['groupId' => $group->id]) }}" class="flex border border-transparent gap-[10px] hover:bg-gray-300  hover:border-gray-400 p-2 rounded transition"><img src="{{ asset('images/icons/home.svg') }}" alt="home">Início</a>
        <a href="#" class="flex gap-[10px] border border-transparent hover:bg-gray-300 hover:border-gray-400 p-2 rounded transition"><img src="{{ asset('images/icons/Calendar.svg') }}" alt="escalas">Escalas das Missas</a>
        <a href="#" class="flex gap-[10px] border border-transparent hover:bg-gray-300 hover:border-gray-400 p-2 rounded transition"><img src="{{ asset('images/icons/Book-open.svg') }}" alt="formações">Formações</a>
        <a href="#" class="flex gap-[10px] border border-transparent hover:bg-gray-300 hover:border-gray-400 p-2 rounded transition"><img src="{{ asset('images/icons/gallery.svg') }}" alt="galeria">Galeria</a>
        <a href="{{ route('dashboard.settings', ['groupId' => $group->id]) }}" class="flex gap-[10px] border border-transparent hover:bg-gray-300 hover:border-gray-400 p-2 rounded transition"><img src="{{ asset('images/icons/Settings.svg') }}" alt="configurações">Configurações</a>
    </nav>
</div>
