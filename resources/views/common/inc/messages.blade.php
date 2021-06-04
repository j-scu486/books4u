@if(count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="message message--error">
            Error: {{ $error }}
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="message message--success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="message message--error">
        {{ session('error') }}
    </div>
@endif
