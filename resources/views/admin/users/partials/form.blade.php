{{-- --------------------------------------------------------------------------------------------------------- --}}
{{-- USUÁRIO FORM CREATE / EDIT --}}
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
        <label class="form_create_edit_label" for="name">Nome*:</label>
        <input type="text" placeholder="Nome" name="name" value="{{ $user->name ?? old('name') }}"
        class="form_create_edit_input">
        @error('name')
            <div class="text-red-500">{{ $message }}</div>
        @enderror
    </div>
    @if($form_crud == "editar")
        <div>
            <label class="form_create_edit_label" for="user_name">Nome de Usuário:</label>
            <input type="text" placeholder="Nome de Usuário" name="user_name" value="{{ $user->user_name ?? old('user_name') }}"
            class="form_create_edit_input">
            @error('name')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
    @endif
    <div>
        <label class="form_create_edit_label" for="email">E-mail*:</label>
        <input id="email" type="text" placeholder="E-mail" name="email" value="{{ $user->email ?? old('email') }}"  onblur="validarEmail();"  
        class="form_create_edit_input">
        <div id="mensagem_email" class="text-red-500"></div>
        @error('email')
            <div class="text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label class="form_create_edit_label" for="admin">Administrador:</label>
        <select name="admin" id="admin" class="form_create_edit_select">
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
        <label class="form_create_edit_label" for="password">Senha {{ $obrigatorio }}:</label>
        <input id="password" type="password" placeholder="Senha" name="password" value="" 
        class="form_create_edit_input">
        <div id="mensagem_password" class="text-red-500"></div>
        @error('password')
            <div class="text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label class="form_create_edit_label" for="password_confirm">Confirme a Senha {{ $obrigatorio }}:</label>
        <input id="password_confirm"  type="password" placeholder="Confirmar Senha" name="password_confirm" value="" onblur="validarSenha();" 
        class="form_create_edit_input">
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
   