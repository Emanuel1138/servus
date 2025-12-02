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
                <h2 class="mb-[20px] font-medium">Iniciar uma nova formação</h2>

                <form action="{{ route('formations.store', $group->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-gray-100 w-[140px] h-[180px] border border-gray-400 rounded flex justify-center items-center hover:border-yellow-500 hover:cursor-pointer">
                        <img src="{{ asset('images/icons/Plus.svg') }}">
                    </button>
                </form>
            </div>
        </main>
    </div>
@endsection

