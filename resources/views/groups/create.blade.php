@extends('layouts.app')

@section('title', 'Criar Grupo')

@section('content')
<div class="max-w-xl mx-auto mt-10 mb-10">

    <div class="bg-white border border-gray-400 rounded-lg shadow-md">

        <div class="border-b border-gray-400 px-6 pt-4 pb-1">
            <h1 class="text-2xl font-semibold text-gray-800">Criar Grupo</h1>
            <p class="text-gray-600 mb-4 text-sm">Preencha as informações abaixo para cadastrar um novo grupo de coroinhas.</p>
        </div>

        <form action="{{ route('groups.store') }}" method="POST">
            @csrf

               <div class="border-b border-gray-300 px-6 py-4 flex">
                    <div class="max-w-2">
                         <label for="parash" class="block text-gray-700 font-medium mb-1">Paróquia</label>
                    </div>
                    <div class="ml-[160px] w-full">
                         <input type="text" id="parash" name="parash" value="{{ old('parash') }}" placeholder="Ex.: Paróquia São José" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                         @error('parash')
                              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                         @enderror
                    </div>
                    
                    
               </div>

               <div class="border-b border-gray-300 px-6 py-4 flex">
                    <div class="max-w-2">
                         <label for="diocese" class="block text-gray-700 font-medium mb-1">Diocese</label>
                    </div>
                    
                    <div class="ml-[160px] w-full">
                         <input type="text" id="diocese" name="diocese" value="{{ old('diocese') }}" placeholder="Ex.: Diocese de Crato" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                         @error('diocese')
                              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                         @enderror
                    </div>
                    
                    
               </div>

               <div class="border-b border-gray-300 px-6 py-4 flex">
                    <div class="max-w-2">
                         <label for="city" class="block text-gray-700 font-medium mb-1">Cidade</label>
                    </div>
                    
                    <div class="ml-[160px] w-full">
                         <input type="text" id="city" name="city" value="{{ old('city') }}" placeholder="Ex.: Juazeiro do Norte" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                         @error('city')
                              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                         @enderror
                    </div>
                    
                    
               </div>

               <div class="border-b border-gray-300 px-6 py-4 flex">
                    <div class="max-w-2">
                         <label for="state" class="block text-gray-700 font-medium mb-1">Estado</label>
                    </div>
                    
                    <div class="ml-[160px] w-full">
                         <input type="text" id="state" name="state" value="{{ old('state') }}" placeholder="Ex.: CE" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                         @error('state')
                              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                         @enderror
                    </div>
                    
                    
               </div>

          <div class="px-6 py-4 flex justify-end space-x-3">

               <a href="{{ route('groups.index') }}"
                    class="flex-1 text-center border border-gray-400 py-2 rounded hover:border-gray-700 transition">
                    Cancelar
               </a>

               <button type="submit" class="flex-1 bg-green-400 border border-green-700 py-2 rounded hover:bg-green-500 transition-colors duration-200">
                    Criar Grupo
               </button>

          </div>

        </form>

    </div>

</div>
@endsection