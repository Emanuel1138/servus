<div class="bg-gray-100 w-64 h-screen flex flex-col border-r border-gray-400">
    <div class="p-6 border-b border-gray-400">
        <h1 class="font-sourceSerif text-xl font-semibold">{{ $group->parash }}</h1>
    </div>
    
    <nav class="flex flex-col gap-4 p-6">
        <a href="{{ route('dashboard', ['groupId' => $group->id]) }}" class="hover:bg-gray-700 p-2 rounded transition">Home</a>
        <a href="#" class="hover:bg-gray-700 p-2 rounded transition">Meus Grupos</a>
        <a href="#" class="hover:bg-gray-700 p-2 rounded transition">Perfil</a>
        <a href="#" class="hover:bg-gray-700 p-2 rounded transition">Sair</a>
    </nav>
</div>
