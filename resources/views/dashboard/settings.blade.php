@extends('layouts.app')

@section('title', 'Servus | Dashboard')

@section('content')
<div class="flex">

    <x-dashboard-sidebar :group="$group" />

    <main class="flex-1 p-8 min-h-screen">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Configurações</h1>

        <div class="flex flex-col md:flex-row gap-8 bg-gray-100 p-6 rounded-lg shadow-md border border-gray-400">

            <div class="md:w-1/3 p-4">
                <h2 class="text-lg font-medium text-gray-700 mb-4">Configurações Gerais</h2>
                <p class="text-gray-500 text-sm">
                    Aqui você pode atualizar os dados do grupo, como nome da paróquia, cidade, estado e diocese.
                </p>
            </div>

            <div class="md:w-2/3 p-6 rounded-lg shadow-sm">
                <x-group-update-form :group="$group" />
            </div>
        </div>

        <div class="mt-6 bg-white p-6 rounded-lg shadow-md border border-gray-400 w-full">
            <div class="max-w-md">
                <h2 class="text-lg font-medium text-gray-700 mb-4">Deletar Grupo</h2>
                <p class="text-gray-500 text-sm mb-4">
                    Atenção: deletar o grupo é uma ação irreversível e removerá todos os membros associados.
                </p>
                <form action="{{ route('groups.destroy', $group) }}" method="POST" 
                    onsubmit="return confirm('Tem certeza que deseja deletar este grupo?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="w-full bg-red-600 text-white py-2 px-4 rounded hover:bg-red-700 transition">
                        Deletar Grupo
                    </button>
                </form>
            </div>
            
        </div>
    </main>
</div>
@endsection
