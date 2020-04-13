<div class="kt-radio-inline">
    @for($i = 1; $i <= $max; $i++)
        @include('components.radio-inline', ['name' => $name, 'value' => $i])
    @endfor
</div>
