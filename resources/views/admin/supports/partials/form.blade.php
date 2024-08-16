{{-- --------------------------------------------------------------------------------------------------------- --}}
{{-- DÚVIDA FORM  --}}
{{-- --------------------------------------------------------------------------------------------------------- --}}

{{-- <x-alert/> --}}
{{-- {{ dd($support); }} --}}
<div class="moldura_corpo">
    {{-- ------------------------------------------------------------------------------------- --}}
    @csrf()
    <div>
        <label class="px-2" for="remetente">Remetente*:</label>
        <input type="text" placeholder="Remetente" name="sender" value="{{ $support->sender ?? old('sender') }}"
        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
        @error('sender')
            <div class="text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label class="px-2" for="assunto">Assunto*:</label>
        <input type="text" placeholder="Assunto" name="subject" value="{{ $support->subject ?? old('subject') }}"
        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
        @error('subject')
            <div class="text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label  class="px-2"for="equipamento">Equipamento: </label>
        <select name="equipment_id" id="equipment_id" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            @foreach($equipments as $equipment)
                <?php
                if($support->equipment_id == $equipment->id){
                ?>
                <option value="{{ $equipment->id }}" selected>{{ $equipment->description }}</option>
                <?php
                }
                else{
                    ?>
                    <option value="{{ $equipment->id }}">{{ $equipment->description }}</option>
                    <?php
                }
                ?>
            @endforeach
        </select>
        @error('equipment_id')
            <div class="text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <label class="px-2" for="duvida">Texto*:</label>
    <textarea name="body" cols="30" rows="5" placeholder="Descrição" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">{{ $support->body ?? old('body') }}</textarea>
    <div class="text-center w-full">
        <button type="submit" class="enviarForm">
            Enviar
        </button>
    </div>
    {{-- ------------------------------------------------------------------------------------- --}}
</div>
<br>
   