<div class="input-group">

    @if(isset($label))
        <label for="{{ $id }}">{{ $label }}</label>
    @endif

    <input
        id="{{ $id ?? null }}"
        class="form-control @error('email') is-invalid @enderror"
        type="{{ $type ?? 'text' }}"
        name="{{ $name }}"

        @if(isset($placeholder))
            placeholder="{{ $placeholder }}"
        @endif

        @if(isset($value))
        value="{{ $value }}"
        @endif

        required
        >

        @error($name)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

</div>
