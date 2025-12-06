@extends('layouts.app')

@section('title', 'Servus | Dashboard')

@section('content')
    <div class="flex">
        <x-dashboard-sidebar :group="$group" />
        <main class="flex-1 p-8 min-h-screen">
            <div>
                <h1 class="text-2xl font-semibold text-gray-800 mb-6">Formações</h1>
            </div>

            <div class="pb-[30px] border-b border-gray-400">
                <h2 class="text-xl mb-[20px] font-medium">Iniciar uma nova formação</h2>

                <form action="{{ route('formations.store', $group->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-gray-100 w-[140px] h-[180px] border border-gray-400 rounded flex justify-center items-center hover:border-yellow-500 hover:cursor-pointer">
                        <img src="{{ asset('images/icons/Plus.svg') }}">
                    </button>
                </form>
            </div>

            <div>
                <h2 class="text-xl mt-[30px] mb-[20px] font-medium">Formações recentes</h2>
                @if ($formations == null)
                    <p class="mt-[20px] text-gray-600">Nenhuma formação disponível.</p>
                @else
                    @foreach ($formations as $formation)
                        <div class="bg-gray-100 mt-[20px] p-[15px] border border-gray-400 rounded hover:border-yellow-500">
                            <a href="{{ route('formations.edit', $formation->slug) }}" class="text-lg font-medium text-gray-800 hover:underline">
                                {{ $formation->title }}
                            </a>
                            <p class="text-sm text-gray-600">Última edição: {{ $formation->updated_at->format('d/m/Y H:i') }}</p>
                        </div>
                    @endforeach
                @endif
                
            </div>
        </main>
    </div>
@endsection

