{{-- --------------------------------------------------------------------------------------------------------- --}}
{{-- EQUIPAMENTO FORM CREATE / EDIT --}}
{{-- --------------------------------------------------------------------------------------------------------- --}}

{{-- <x-alert/> --}}
{{-- {{ dd($support); }} --}}

<div class="moldura_corpo">
    {{-- ------------------------------------------------------------------------------------- --}}
    @csrf()
    <div>
        <label class="form_create_edit_label" for="descricao">Descrição*:</label>
        <input type="text" placeholder="Remetente" name="sender" value="{{ $equipment->description ?? old('description') }}"
        class="form_create_edit_input">
        @error('description')
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
   