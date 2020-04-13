@extends('layout.authorized.app')
@section('title', 'My Recordings')
@section('dashboard-active', 'kt-menu__item--active')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <h4>Uploaded video and audio</h4>
            <div class="card col-lg-12">
                <div class="card-body">
                    <div class="row">
                        @if(count($uploads) > 0)
                            @foreach($uploads  as $upload)
                            <div class="col-sm-12 col-md-4 col-lg-3 mb-4 " style="box-shadow: 2px 1px 4px 4px #e0dbdb;">
                                <div class="kt-portlet" >
                                    <div class="kt-portlet__head">
                                        <div class="kt-portlet__head-label">
                                            <h3 class="kt-portlet__head-title">
                                                {{ $upload->created_at }}
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="kt-portlet__body" >
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
                                @if(isset($upload->transcript->id))
                                    <div class="kt-portlet"  id="{{'transcript-'.$upload->id}}">
                                        @include('components.spinner')
                                    </div>
                                @else
                                    <div class="kt-portlet " id="{{'transcript-'.$upload->id}}">
                                        <p class="card-title text-center">No word cloud</p>

                                    </div>
                                @endif
                            </div>
                        @endforeach
                    @else
                    </div>
                    <div class="text-center mt-5">
                            <h4>No uploads found.</h4>
                        </div>
                    @endif
                </div>
            </div>

        </div>
        <div class="row">
            <h4>Texts </h4>
            <div class="card col-lg-12">
                <div class="card-body">
                    <div class="row">
                    @if(count($texts) > 0)
                        @foreach($texts  as $text)
                            <div class="col-sm-12 col-md-4 col-lg-3">
                                <div class="kt-portlet">
                                    <p class="text-justify text-ellipsis">{{$text->text}}</p>
                                </div>
                            </div>
                        @endforeach
                    @else
                    </div>
                    <div class="text-center mt-5">
                            <h4>No uploads found.</h4>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="https://d3js.org/d3.v3.min.js"></script>
    <script src="https://rawgit.com/jasondavies/d3-cloud/master/build/d3.layout.cloud.js"></script>
    <script src="{{ asset('js/pages/word-clouds.js') }}?time={{ time() }}"></script>
@endsection

