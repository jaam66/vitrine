@if ($errors->any())
    <div class="alert_erro">
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
    </div>
@endif