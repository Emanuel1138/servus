@extends('layouts.app')

@section('title', 'Servus | Eventos')

@section('content')
    <div class="flex">
        <x-dashboard-sidebar :group="$group" />
        <main class="flex-1 p-8 min-h-screen">
            <div>
                <h1 class="text-2xl font-semibold text-gray-800 mb-6">Eventos</h1>
            </div>
            <div class="mb-4">
                <a href="{{ route('events.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Criar Novo Evento</a>
            </div>
            <div class="bg-gray-200 border border-gray-400 shadow rounded-lg p-6">
                @if($events->isEmpty())
                    <p class="text-gray-600">Nenhum evento encontrado.</p>
                @else  
                    <table class="w-full table-auto">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border-b">Título</th>
                                <th class="px-4 py-2 border-b">Data do Evento</th>
                                <th class="px-4 py-2 border-b">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($events as $event)
                                <tr>
                                    <td class="px-4 py-2 border-b">{{ $event->title }}</td>
                                    <td class="px-4 py-2 border-b">{{ $event->event_date->format('d/m/Y') }}</td>
                                    <td class="px-4 py-2 border-b">
                                        <a href="{{ route('events.edit', $event) }}" class="text-blue-600 hover:underline">Editar</a>
                                        |
                                        <form action="{{ route('events.destroy', $event) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Tem certeza que deseja excluir este evento?')">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
        </main>
    </div>
@endsection

