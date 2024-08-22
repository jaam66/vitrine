{{-- --------------------------------------------------------------------------------------------------------- --}}
{{-- EQUIPAMENTO FORM  --}}
{{-- --------------------------------------------------------------------------------------------------------- --}}

{{-- <x-alert/> --}}
{{-- {{ dd($support); }} --}}

<div class="moldura_corpo">
    {{-- ------------------------------------------------------------------------------------- --}}
    @csrf()
    <div>
        <label class="px-2" for="descricao">Descrição*:</label>
        <input type="text" placeholder="Remetente" name="sender" value="{{ $equipment->description ?? old('description') }}"
        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
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
   