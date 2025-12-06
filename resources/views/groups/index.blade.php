@extends('layouts.app')

@section('title', 'Servus | Groups')

@section('content')
    <div class="pl-[14%] pr-[14%] min-h-screen">
        <div class="pl-0 p-[30px] flex justify-between items-center border-b border-gray-400 mb-[40px]">
            <h1 class="text-2xl">Grupos</h1>
            <div>
                <button>
                    <a href="{{ route('groups.create') }}" class="bg-green-400 border border-green-700 px-4 py-2 rounded-lg hover:bg-green-500 transition-colors duration-200">
                        <span class="text-2xl text-green-800">+</span> Novo Grupo
                    </a>
                </button>
            </div>
        </div>

        <div class="grid flex-wrap grid-cols-2 gap-[30px] pb-[50px] justify-items-center">
            @if($groups->isEmpty())
                <p>Você ainda não participa de nenhum grupo.</p>
            @else
            @foreach ( $groups as $group)
                <div class="card-group group bg-gray-100 rounded-2xl w-[390px] h-[250px] border border-gray-400 pt-[30px] p-[30px] 
                transition-all duration-200 hover:shadow-lg hover:border-gray-500">
                    <div class="flex justify-between items-start">
                        <a href="{{ route('dashboard', ['groupId' => $group->id]) }}">
                            <h2 class="text-lg font-medium flex items-center gap-2 hover:underline">{{ $group->parash }}</h2>
                        </a>
                        <div class="inline-block transform transition-all duration-200 group-hover:translate-x-1">
                            <img class="w-[25px]" src="{{ asset('images/icons/chevron-right.svg') }}" alt="arrow">
                        </div>
                    </div>
                    

                    <div class="bg-gray-300 border border-gray-400 rounded-lg mt-[20px] p-1">
                        @if ($group->countUsers() === 1) 
                            <p>{{ $group->countUsers() }} membro</p>
                        @else
                            <p>{{ $group->countUsers() }} membros</p>
                        @endif
                    </div>
                </div>
            @endforeach
            @endif
        </div>
    </div>
    
@endsection

