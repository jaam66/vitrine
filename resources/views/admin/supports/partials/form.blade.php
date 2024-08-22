{{-- --------------------------------------------------------------------------------------------------------- --}}
{{-- OS FORM  --}}
{{-- --------------------------------------------------------------------------------------------------------- --}}

{{-- <x-alert/> --}}
{{-- {{ dd($support); }} --}}

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
        <label  class="px-2"for="equipamento">Equipamento: {{ $obrigatorio }}</label>
        <select name="equipment_id" id="equipment_id" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            <?php
            if(!isset($support->equipment_id)){
                ?>
                <option value="" selected>Escolha um esquipamento</option>
                <?php
            }
            ?>
            @foreach($equipments as $equipment)
                <?php
                if(isset($support->equipment_id) AND ($support->equipment_id == $equipment->id)){
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
    <label class="px-2" for="duvida">Texto {{ $obrigatorio }}:</label>
    <textarea name="body" cols="30" rows="5" placeholder="Descrição" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">{{ $support->body ?? old('body') }}</textarea>
    <div class="text-center w-full">
        <button type="submit" class="enviarForm">
            Enviar
        </button>
    </div>
    {{-- ------------------------------------------------------------------------------------- --}}
</div>
<br>
   