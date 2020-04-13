<div class="kt-portlet">
    <div class="kt-portlet__head sticky" style="z-index:{{ $z_index }};">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">{{ $title }}</h3>
        </div>
    </div>
    <div class="kt-portlet__body">
        {{ $slot }}
    </div>
</div>
