@extends('layouts.app')

@section('title', 'Servus | Perfil de usuário')

@section('content')
    <div class="flex">
        <div class="bg-gray-100 w-64 min-h-screen flex flex-col border-r border-gray-400">
            <div class="p-6 border-b border-gray-400">
                <a href="{{ url()->previous() }}" class="flex items-center gap-2">
                    <img class="w-5" src="{{ asset('images/Arrow-left.svg') }}" alt="">    
                    <h1>Voltar</h1> 
                </a>
                
            </div>
            
            <nav class="flex flex-col gap-4 p-6">
                <a href=""> </a>
            </nav>
        </div>
        <main class="flex-1 p-8 min-h-screen">
            <div>
                <div class="max-w-3xl mx-auto min-h-screen mt-9 mb-9">
                    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Perfil</h1>
                    
                    {{-- 
                        ALTERAÇÃO AQUI: 
                        1. Adicionado 'border border-gray-400' para igualar ao card de baixo.
                        2. Alterado 'rounded-xl' para 'rounded-lg' para padronizar.
                        3. Adicionado 'mb-8' para dar espaçamento entre os cards.
                    --}}
                   <div class="w-full bg-white border border-gray-400 rounded-lg shadow-md p-6 flex items-center gap-6 mb-8">
                    
                    {{-- Foto com anel de destaque --}}
                    <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-gray-100 shadow-inner flex-shrink-0">
                        <img 
                            src="{{ $user->profile_photo_url ?? 'https://via.placeholder.com/150' }}" 
                            alt="Foto de Perfil"
                            class="w-full h-full object-cover"
                        >
                    </div>

                    <div class="flex flex-col justify-center">
                        <h2 class="text-2xl font-bold text-gray-900 leading-tight">
                            Nome de Usuário
                        </h2>

                        <p class="text-gray-500 text-sm mb-3">
                            email@gmail.com
                        </p>

                        {{-- MELHORIA: Badge de cargo estilizada --}}
                        <div>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                Coordenador
                            </span>
                        </div>
                    </div>
                </div>
                    
                    <div class="bg-white border border-gray-400 rounded-lg shadow-md">

                        <div class="border-b border-gray-400 px-6 pt-4 pb-4">
                            <h1 class="text-xl font-semibold text-gray-800">Informações do perfil</h1>
                        </div>

                        <form action="#" method="POST">
                            @csrf

                            <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                            <div class="px-6 py-4 grid grid-cols-1 md:grid-cols-3 gap-4 pt-[30px] pb-[10px]">
                                <div>
                                    <label for="primeiro_nome" class="block text-gray-700 font-medium mb-1">
                                        Primeiro Nome
                                    </label>
                                </div>

                                <div class="md:col-span-2">
                                    <input type="text" id="primeiro_nome" name="primeiro_nome"
                                        value="{{ old('primeiro_nome') }}"
                                        placeholder="Ex.: João"
                                        class="w-full border border-gray-300 rounded px-3 py-2 
                                            focus:outline-none focus:ring-2 focus:ring-green-500">

                                    @error('primeiro_nome')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="px-6 py-4 grid grid-cols-1 md:grid-cols-3 gap-4 pt-[30px] pb-[10px]">
                                <div>
                                    <label for="segundo_nome" class="block text-gray-700 font-medium mb-1">
                                        Segundo Nome
                                    </label>
                                </div>

                                <div class="md:col-span-2">
                                    <input type="text" id="segundo_nome" name="segundo_nome"
                                        value="{{ old('segundo_nome') }}"
                                        placeholder="Ex.: Silva"
                                        class="w-full border border-gray-300 rounded px-3 py-2 
                                            focus:outline-none focus:ring-2 focus:ring-green-500">

                                    @error('segundo_nome')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="px-6 py-4 grid grid-cols-1 md:grid-cols-3 gap-4 pt-[30px] pb-[10px]">
                                <div>
                                    <label for="telefone" class="block text-gray-700 font-medium mb-1">
                                        Telefone
                                    </label>
                                </div>

                                <div class="md:col-span-2">
                                    <input type="text" id="telefone" name="telefone"
                                        value="{{ old('telefone') }}"
                                        placeholder="Ex.: (88) 99999-0000"
                                        class="w-full border border-gray-300 rounded px-3 py-2 
                                            focus:outline-none focus:ring-2 focus:ring-green-500">

                                    @error('telefone')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="px-6 py-4 grid grid-cols-1 md:grid-cols-3 gap-4 pt-[30px] pb-[10px]">
                                <div>
                                    <label for="data_nascimento" class="block text-gray-700 font-medium mb-1">
                                        Data de Nascimento
                                    </label>
                                </div>

                                <div class="md:col-span-2">
                                    <input type="date" id="data_nascimento" name="data_nascimento"
                                        value="{{ old('data_nascimento') }}"
                                        class="w-full border border-gray-300 rounded px-3 py-2 
                                            focus:outline-none focus:ring-2 focus:ring-green-500">

                                    @error('data_nascimento')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="px-6 py-4 grid grid-cols-1 md:grid-cols-3 gap-4 pt-[30px] pb-[30px]">
                                <div>
                                    <label for="data_investidura" class="block text-gray-700 font-medium mb-1">
                                        Data da Investidura
                                    </label>
                                </div>

                                <div class="md:col-span-2">
                                    <input type="date" id="data_investidura" name="data_investidura"
                                        value="{{ old('data_investidura') }}"
                                        class="w-full border border-gray-300 rounded px-3 py-2 
                                            focus:outline-none focus:ring-2 focus:ring-green-500">

                                    @error('data_investidura')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>


                            <div class="px-6 py-4 flex justify-end space-x-3">

                                <a href="{{ url()->previous() }}"
                                    class="flex-1 text-center border border-gray-400 py-2 rounded hover:border-gray-700 transition">
                                    Cancelar
                                </a>

                                <button type="submit"
                                    class="flex-1 bg-green-400 border border-green-700 py-2 rounded hover:bg-green-500 transition-colors duration-200">
                                    Salvar Perfil
                                </button>

                            </div>

                        </form>

                    </div>

                </div>


            </div>
        </main>
    </div>
@endsection