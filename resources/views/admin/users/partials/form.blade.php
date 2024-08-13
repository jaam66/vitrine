{{-- --------------------------------------------------------------------------------------------------------- --}}
{{-- USUÁRIO FORM  --}}
{{-- --------------------------------------------------------------------------------------------------------- --}}

{{-- <x-alert/> --}}
<div class="moldura_corpo">
    {{-- ------------------------------------------------------------------------------------- --}}
    @csrf()
    <div>
        <label for="name">Nome*:</label>
        <input type="text" placeholder="Nome" name="name" value="{{ $user->name ?? old('name') }}"
        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
        @error('name')
            <div class="text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="user_name">Nome de Usuário*:</label>
        <input type="text" placeholder="Nome de Usuário" name="user_name" value="{{ $user->user_name ?? old('user_name') }}"
        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
        @error('user_name')
            <div class="text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="email">E-mail*:</label>
        <input type="text" placeholder="E-mail" name="email" value="{{ $user->email ?? old('email') }}"
        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
        @error('user_name')
            <div class="text-red-500">{{ $message }}</div>
        @enderror
    </div>

        <button type="submit" class="enviarForm">
            Enviar
        </button>
    </div>
    {{-- ------------------------------------------------------------------------------------- --}}
</div>
<br>
   