@extends('layouts.app')

@section('title', 'Servus | Groups')

@section('content')
    <div class="pl-[70px] pr-[70px]">
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

        <div class="grid grid-cols-3 gap-[30px] pb-[50px]">
            <div class="card-group group bg-gray-100 rounded-2xl w-[400px] h-[250px] border border-gray-400 pt-[30px] p-[30px] 
            transition-all duration-200 hover:shadow-lg hover:border-gray-500 cursor-pointer">

                <div class="flex justify-between items-start">
                    <h2 class="text-lg font-medium flex items-center gap-2">
                        Nome do grupo                    
                    </h2>

                    <div class="inline-block transform transition-all duration-200 group-hover:translate-x-1">
                            <a href="#"><img class="w-[25px]" src="{{ asset('images/icons/chevron-right.svg') }}" alt="arrow"></a>
                    </div>
                </div>

                <div class="bg-gray-300 border border-gray-400 rounded-lg mt-[20px] p-1">
                    <p>12 membros</p>
                </div>
            </div>
            <div class="card-group group bg-gray-100 rounded-2xl w-[400px] h-[250px] border border-gray-400 pt-[30px] p-[30px] 
            transition-all duration-200 hover:shadow-lg hover:border-gray-500 cursor-pointer">

                <div class="flex justify-between items-start">
                    <h2 class="text-lg font-medium flex items-center gap-2">
                        Nome do grupo                    
                    </h2>

                    <div class="inline-block transform transition-all duration-200 group-hover:translate-x-1">
                            <a href="#"><img class="w-[25px]" src="{{ asset('images/icons/chevron-right.svg') }}" alt="arrow"></a>
                    </div>
                </div>

                <div class="bg-gray-300 border border-gray-400 rounded-lg mt-[20px] p-1">
                    <p>12 membros</p>
                </div>
            </div>
            <div class="card-group group bg-gray-100 rounded-2xl w-[400px] h-[250px] border border-gray-400 pt-[30px] p-[30px] 
            transition-all duration-200 hover:shadow-lg hover:border-gray-500 cursor-pointer">

                <div class="flex justify-between items-start">
                    <h2 class="text-lg font-medium flex items-center gap-2">
                        Nome do grupo                    
                    </h2>

                    <div class="inline-block transform transition-all duration-200 group-hover:translate-x-1">
                            <a href="#"><img class="w-[25px]" src="{{ asset('images/icons/chevron-right.svg') }}" alt="arrow"></a>
                    </div>
                </div>

                <div class="bg-gray-300 border border-gray-400 rounded-lg mt-[20px] p-1">
                    <p>12 membros</p>
                </div>
            </div>
            <div class="card-group group bg-gray-100 rounded-2xl w-[400px] h-[250px] border border-gray-400 pt-[30px] p-[30px] 
            transition-all duration-200 hover:shadow-lg hover:border-gray-500 cursor-pointer">

                <div class="flex justify-between items-start">
                    <h2 class="text-lg font-medium flex items-center gap-2">
                        Nome do grupo                    
                    </h2>

                    <div class="inline-block transform transition-all duration-200 group-hover:translate-x-1">
                            <a href="#"><img class="w-[25px]" src="{{ asset('images/icons/chevron-right.svg') }}" alt="arrow"></a>
                    </div>
                </div>

                <div class="bg-gray-300 border border-gray-400 rounded-lg mt-[20px] p-1">
                    <p>12 membros</p>
                </div>
            </div>
        </div>
    </div>
    
@endsection

