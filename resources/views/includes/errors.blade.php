@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors as $error)
            {{ $error }}
        @endforeach
    </div>
@endif
