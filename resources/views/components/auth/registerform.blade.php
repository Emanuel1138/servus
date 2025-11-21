<form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="mb-4">
        <label for="name" class="block text-gray-700 mb-2">Nome</label>
        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-gray-500">
        @error('name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="email" class="block text-gray-700 mb-2">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required
            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-gray-500">
        @error('email')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="password" class="block text-gray-700 mb-2">Senha</label>
        <input id="password" type="password" name="password" required
            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-gray-500">
        @error('password')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="password_confirmation" class="block text-gray-700 mb-2">Confirmar Senha</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required
            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-gray-500">
    </div>

    <div class="mb-4">
        <button type="submit"
            class="w-full bg-gray-950 text-white py-2 px-4 rounded hover:bg-gray-700 transition">
            Criar Conta
        </button>
    </div>

    <div class="text-center">
        <p>Já possui conta?
            <span class="pl-[10px]">
                <a href="{{ route('login') }}" class="text-blue-700 hover:underline">Entrar</a>
            </span>
        </p>
    </div>
</form>
