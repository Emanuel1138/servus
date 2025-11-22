<form method="POST" action="{{ route('groups.update', $group) }}">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label for="parash" class="block text-gray-700 font-medium mb-1">Paróquia</label>
        <input type="text" id="parash" name="parash" value="{{ old('parash', $group->parash) }}"
               class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
        @error('parash') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="mb-4">
        <label for="diocese" class="block text-gray-700 font-medium mb-1">Diocese</label>
        <input type="text" id="diocese" name="diocese" value="{{ old('diocese', $group->diocese) }}"
               class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
        @error('diocese') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="mb-4">
        <label for="city" class="block text-gray-700 font-medium mb-1">Cidade</label>
        <input type="text" id="city" name="city" value="{{ old('city', $group->city) }}"
               class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
        @error('city') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="mb-4">
        <label for="state" class="block text-gray-700 font-medium mb-1">Estado</label>
        <input type="text" id="state" name="state" value="{{ old('state', $group->state) }}"
               class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
        @error('state') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="flex mt-10 gap-3">
        <a href="{{ route('dashboard.settings', ['groupId' => $group->id]) }}" 
           class="flex-1 text-center border border-gray-400 py-2 rounded hover:border-gray-700 transition">
            Cancelar
        </a>

        <button type="submit" class="flex-1 bg-green-600 text-white py-2 rounded hover:bg-green-700 transition">
            Atualizar Grupo
        </button>
    </div>
</form>
