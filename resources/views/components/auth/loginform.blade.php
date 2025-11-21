<form method="POST" action="{{ route('login') }}">
    @csrf

    <!-- Email -->
    <div class="mb-4">
        <label for="email" class="block text-gray-700 mb-2">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-500">
        @error('email')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Senha -->
    <div class="mb-4">
        <label for="password" class="block text-gray-700 mb-2">Senha</label>
        <input id="password" type="password" name="password" required
            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-500">
        @error('password')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Lembrar-me -->
    <div class="mb-4 flex items-center">
        <input type="checkbox" name="remember" id="remember" class="mr-2">
        <label for="remember" class="text-gray-700">Lembrar-me</label>
    </div>

    <!-- Botão -->
    <div class="mb-4">
        <button type="submit"
            class="w-full bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600 transition">
            Entrar
        </button>
    </div>

    <!-- Link para registro -->
    <div class="text-center">
        <a href="{{ route('register') }}" class="text-green-500 hover:underline">Ainda não tem conta? Cadastre-se</a>
    </div>
</form>
