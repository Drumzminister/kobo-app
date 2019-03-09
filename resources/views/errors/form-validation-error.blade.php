@if ($errors->has($inputName))
    <span class="invalid-feedback" role="alert" style="display: block;">
        <strong>{{ $errors->first($inputName) }}</strong>
    </span>
@endif