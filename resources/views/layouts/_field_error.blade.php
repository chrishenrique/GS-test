@if ($errors->has($field))
    <span class="help-block"  style="color: red;">
        <strong>{{ $errors->first($field) }}</strong>
    </span>
@endif