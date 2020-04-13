<div class="col-sm-12 col-md-6 col-lg-4 mb-5">
    <div class="outline-primary">
        <div class="text-center">
            <a href="{{ route('capture') }}?voice={{ str_replace(' ', '_', \Illuminate\Support\Str::lower($voice)) }}" class="btn btn-primary btn-wide mb-3 btn-lg">{{ $voice }}</a>
        </div>
        {{ $slot }}
    </div>
</div>
