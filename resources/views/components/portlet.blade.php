<div class="kt-portlet">
    @if(isset($title))
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">{{ $title }}</h3>
        </div>
    </div>
    @endif
    <div class="kt-portlet__body">
       {{ $slot }}
    </div>
</div>
