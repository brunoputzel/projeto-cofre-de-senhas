<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Editar Credencial') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form method="POST" action="{{ route('credentials.update', $credential) }}">
                        @csrf 
                        @method('PUT')
                        <div>
                            <label for="service_name">Nome do Serviço</label>
                            <input id="service_name" class="block mt-1 w-full" type="text" name="service_name" value="{{ old('service_name', $credential->service_name) }}" required autofocus />
                            @error('service_name')
                                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="username">Usuário/Email</label>
                            <input id="username" class="block mt-1 w-full" type="text" name="username" value="{{ old('username', $credential->username) }}" required />
                            @error('username')
                                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="password">Senha</label>
                            <div class="relative">
                                <input id="password" class="block mt-1 w-full pe-10" type="password" name="password" value="{{ old('password', $credential->password) }}" />
                                <button type="button" id="togglePassword" class="absolute inset-y-0 end-0 flex items-center pe-3 text-gray-500">
                                    <svg id="eyeOpen" class="h-5 w-5 hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.432 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                    <svg id="eyeClosed" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.575M9 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                </button>
                            </div>
                            @error('password')
                                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('credentials.index') }}" class="inline-flex items-center px-4 py-2 red border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150 mr-4">
                                Cancelar
                            </a>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Salvar
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    // Pega os elementos do HTML pelos seus IDs
    const togglePasswordButton = document.querySelector('#togglePassword');
    const passwordInput = document.querySelector('#password');
    const eyeOpenIcon = document.querySelector('#eyeOpen');
    const eyeClosedIcon = document.querySelector('#eyeClosed');

    // Adiciona um "ouvinte" para o evento de clique no botão
    togglePasswordButton.addEventListener('click', function () {
        // Verifica o tipo atual do campo de senha
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        // Define o novo tipo
        passwordInput.setAttribute('type', type);

        // Alterna a classe 'hidden' nos ícones para mostrar/esconder o correto
        eyeOpenIcon.classList.toggle('hidden');
        eyeClosedIcon.classList.toggle('hidden');
    });
</script>