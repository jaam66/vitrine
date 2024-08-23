{{-- --------------------------------------------------------------------------------------------------------- --}}
{{-- OS FORM CREATE / EDIT  --}}
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
        <label class="form_create_edit_label" for="remetente">Remetente*:</label>
        <input type="text" placeholder="Remetente" name="sender" value="{{ $support->sender ?? old('sender') }}"
        class="form_create_edit_input">
        @error('sender')
            <div class="text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label class="form_create_edit_label" for="assunto">Assunto*:</label>
        <input type="text" placeholder="Assunto" name="subject" value="{{ $support->subject ?? old('subject') }}"
        class="form_create_edit_input">
        @error('subject')
            <div class="text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label  class="form_create_edit_label"for="equipamento">Equipamento: {{ $obrigatorio }}</label>
        <select name="equipment_id" id="equipment_id" class="form_create_edit_select">
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
    <label class="form_create_edit_label" for="duvida">Texto {{ $obrigatorio }}:</label>
    <textarea name="body" cols="30" rows="5" placeholder="Descrição" class="form_create_edit_textarea">{{ $support->body ?? old('body') }}</textarea>
    <div class="text-center w-full">
        <button type="submit" class="enviarForm">
            Enviar
        </button>
    </div>
    {{-- ------------------------------------------------------------------------------------- --}}
</div>
<br>
   