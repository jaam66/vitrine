{{-- --------------------------------------------------------------------------------------------------------- --}}
{{-- USUÁRIO FORM  --}}
{{-- --------------------------------------------------------------------------------------------------------- --}}

{{-- <x-alert/> --}}
<div class="moldura_corpo">
    {{-- ------------------------------------------------------------------------------------- --}}
    @csrf()
    <div>
        <label class="px-2" for="name">Nome*:</label>
        <input type="text" placeholder="Nome" name="name" value="{{ $user->name ?? old('name') }}"
        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
        @error('name')
            <div class="text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label class="px-2" for="email">E-mail*:</label>
        <input type="text" placeholder="E-mail" name="email" value="{{ $user->email ?? old('email') }}"
        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
        @error('email')
            <div class="text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label class="px-2" for="admin">Administrador:</label>
        <select name="admin" id="admin" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            <?php
            if(isset($user)){
                if($user->admin == 0){
                    $selected0 = "selected";
                    $selected1 = "";
                }
                elseif($user->admin == 1){
                    $selected0 = "";
                    $selected1 = "selected";
                }
            }
            else{
                $selected0 = "selected";
                $selected1 = "";
            }
            ?>
            <option value="1" {{ $selected1 }}>Sim</option>
            <option value="0" {{ $selected0 }}>Não</option>
        </select>
        @error('admin')
            <div class="text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label class="px-2" for="password">Senha*:</label>
        <input type="password" placeholder="Senha" name="password" value=""
        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
        @error('password')
            <div class="text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div class="text-center w-full">
        <button type="submit" class="enviarForm">
            Enviar
        </button>
    </div>
    {{-- ------------------------------------------------------------------------------------- --}}
</div>
<br>
   