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
            
            <nav class="flex flex-col gap-4 p-6"></nav>
        </div>

        <main class="flex-1 p-8 min-h-screen">
            <div>
                <div class="max-w-3xl mx-auto min-h-screen mt-9 mb-9">
                    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Perfil</h1>
                    
                    <div class="w-full bg-white border border-gray-400 rounded-lg shadow-md p-6 flex items-center gap-6 mb-8">
                        
                        <div class="flex justify-center items-center w-24 h-24 rounded-full overflow-hidden border-4 border-gray-700 shadow-inner flex-shrink-0">
                            <img 
                                src="{{ asset('images/icons/User.svg') }}" 
                                alt="Foto de Perfil"
                                class="w-[80%] object-cover"
                            >
                        </div>

                        <div class="flex flex-col justify-center">
                            <h2 class="text-2xl font-bold text-gray-900 leading-tight">
                                {{ auth()->user()->name }}
                            </h2>

                            <p class="text-gray-500 text-sm mb-3">
                                {{ auth()->user()->email }}
                            </p>
                        </div>
                    </div>
                    
                    <div class="bg-white border border-gray-400 rounded-lg shadow-md">

                        <div class="border-b border-gray-400 px-6 pt-4 pb-4">
                            <h1 class="text-xl font-semibold text-gray-800">Informações do perfil</h1>
                        </div>

                        <form action="{{ route('profile.update', $profile) }}" method="POST">
                            @method('patch')
                            @csrf

                            <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                            <div class="px-6 py-4 grid grid-cols-1 md:grid-cols-3 gap-4 pt-[30px] pb-[10px]">
                                <div>
                                    <label for="primeiro_nome" class="block text-gray-700 font-medium mb-1">
                                        Primeiro Nome
                                    </label>
                                </div>

                                <div class="md:col-span-2">
                                    <input type="text" id="primeiro_nome" name="first_name"
                                        value="{{ old('first_name', $profile->first_name) }}"
                                        placeholder="Ex.: João"
                                        class="w-full border border-gray-300 rounded px-3 py-2 
                                            focus:outline-none focus:ring-2 focus:ring-green-500">

                                    @error('first_name')
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
                                    <input type="text" id="segundo_nome" name="last_name"
                                        value="{{ old('last_name', $profile->last_name) }}"
                                        placeholder="Ex.: Silva"
                                        class="w-full border border-gray-300 rounded px-3 py-2 
                                            focus:outline-none focus:ring-2 focus:ring-green-500">

                                    @error('last_name')
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
                                    <input type="text" id="telefone" name="phone"
                                        value="{{ old('phone', $profile->phone) }}"
                                        placeholder="Ex.: (88) 99999-0000"
                                        class="w-full border border-gray-300 rounded px-3 py-2 
                                            focus:outline-none focus:ring-2 focus:ring-green-500">

                                    @error('phone')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="px-6 py-4 grid grid-cols-1 md:grid-cols-3 gap-4 pt-[30px] pb-[10px]">
                                <div>
                                    <label for="birth_date" class="block text-gray-700 font-medium mb-1">
                                        Data de Nascimento
                                    </label>
                                </div>

                                <div class="md:col-span-2">
                                  <input type="text"
                                        id="birth_date"
                                        name="birth_date"
                                        placeholder="dd/mm/aaaa"
                                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                                        value="{{ old('birth_date', $profile->birth_date ? \Carbon\Carbon::parse($profile->birth_date)->format('d/m/Y') : '') }}">



                                    @error('birth_date')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="px-6 py-4 grid grid-cols-1 md:grid-cols-3 gap-4 pt-[30px] pb-[30px]">
                                <div>
                                    <label for="investiture_date" class="block text-gray-700 font-medium mb-1">
                                        Data da Investidura
                                    </label>
                                </div>

                                <div class="md:col-span-2">
                                    <input type="text"
                                        id="investiture_date"
                                        name="investiture_date"
                                        placeholder="dd/mm/aaaa"
                                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                                        value="{{ old('investiture_date', $profile->investiture_date ? \Carbon\Carbon::parse($profile->investiture_date)->format('d/m/Y') : '') }}">

                                    @error('investiture_date')
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
    @section('scripts')
        <script>
            IMask(document.getElementById('telefone'), {
                mask: '(00) 00000-0000'
            });

           function aplicarMascaraData(elementId) {
                var element = document.getElementById(elementId);

                var maskOptions = {
                    mask: Date,
                    pattern: 'd{/}`m{/}`Y',
                    blocks: {
                    d: {
                        mask: IMask.MaskedRange,
                        from: 1,
                        to: 31,
                        maxLength: 2
                    },
                    m: {
                        mask: IMask.MaskedRange,
                        from: 1,
                        to: 12,
                        maxLength: 2
                    },
                    Y: {
                        mask: IMask.MaskedRange,
                        from: 1900,
                        to: 2099,
                        maxLength: 4
                    }
                    },
                    format: function (date) {
                    var day = date.getDate();
                    var month = date.getMonth() + 1;
                    var year = date.getFullYear();
                    return [day, month, year].map(n => String(n).padStart(2, '0')).join('/');
                    },
                    parse: function (str) {
                    var parts = str.split('/');
                    return new Date(parts[2], parts[1] - 1, parts[0]);
                    }
                };

                return IMask(element, maskOptions);
            }

            
            aplicarMascaraData('birth_date');
            aplicarMascaraData('investiture_date');


        </script>

    @endsection
@endsection
