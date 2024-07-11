    <!-- <input type="text" value="{{ csrf_token() }}" name="_token"> -->
    @csrf()
    <input type="text" size="50" value="{{ $support->subject ?? old('subject') }}" placeholder="Assunto" name="subject">
    <br>
    <br>
    <textarea name="body" cols="55" rows="5" placeholder="Descrição">{{ $support->body ?? old('body') }}</textarea>
    <br>
    <button type="submit">Enviar</button>