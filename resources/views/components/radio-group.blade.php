<div>
    @if(isset($value))
        <label>{{ $value }}</label>
    @endif
    <div class="kt-radio-inline">
        <label class="kt-radio">
            <input type="radio" name="{{ $name }}" value="Yes" required> Yes
            <span></span>
        </label>
        <label class="kt-radio">
            <input type="radio" name="{{ $name }}" value="No" required> No
            <span></span>
        </label>
    </div>
</div>
