{{-- --------------------------------------------------------------------------------------------------------- --}}
{{-- USUÁRIO FORM  --}}
{{-- --------------------------------------------------------------------------------------------------------- --}}

{{-- <x-alert/> --}}
{{-- {{ $form_cadastro }} --}}
@php
    $obrigatorio = "*";
    if($form_crud == "editar"){
        $obrigatorio = "";
    }
@endphp
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
    @if($form_crud == "editar")
        <div>
            <label class="px-2" for="user_name">Nome de Usuário:</label>
            <input type="text" placeholder="Nome de Usuário" name="user_name" value="{{ $user->user_name ?? old('user_name') }}"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            @error('name')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
    @endif
    <div>
        <label class="px-2" for="email">E-mail*:</label>
        <input id="email" type="text" placeholder="E-mail" name="email" value="{{ $user->email ?? old('email') }}"  onblur="validarEmail();"  
        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
        <div id="mensagem_email" class="text-red-500"></div>
        @error('email')
            <div class="text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label class="px-2" for="admin">Administrador:</label>
        <select name="admin" id="admin" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            @php
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
            @endphp
            <option value="1" {{ $selected1 }}>Sim</option>
            <option value="0" {{ $selected0 }}>Não</option>
        </select>
        @error('admin')
            <div class="text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label class="px-2" for="password">Senha {{ $obrigatorio }}:</label>
        <input id="password" type="password" placeholder="Senha" name="password" value="" 
        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
        <div id="mensagem_password" class="text-red-500"></div>
        @error('password')
            <div class="text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label class="px-2" for="password_confirm">Confirme a Senha {{ $obrigatorio }}:</label>
        <input id="password_confirm"  type="password" placeholder="Confirmar Senha" name="password_confirm" value="" onblur="validarSenha();" 
        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
        @error('password_confirm')
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
   