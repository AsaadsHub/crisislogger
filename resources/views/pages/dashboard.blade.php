@extends('layout.authorized.app')
@section('title', 'My Recordings')
@section('dashboard-active', 'kt-menu__item--active')
@section('content')

    <div class="container-fluid">
        <div class="row">
            @if(count($uploads) > 0)
                @foreach($uploads  as $upload)
                    <div class="col-sm-12 col-md-4 col-lg-3">
                        <div class="kt-portlet">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-label">
                                    <h3 class="kt-portlet__head-title">
                                        {{ $upload->created_at }}
                                    </h3>
                                </div>
                            </div>
                            <div class="kt-portlet__body">
                                @if(Str::contains($upload->link, '.wav'))
                                    <audio controls src="{{ $upload->link }}"></audio>
                                @else
                                    <video controls>
                                        <source src="{{ $upload->link }}" type="video/webm">
                                        Your browser does not support the video tag.
                                    </video>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-sm-12 col-md-4 col-lg-3">
                    <div class="text-center mt-5">
                        <h4>No uploads found.</h4>
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection

