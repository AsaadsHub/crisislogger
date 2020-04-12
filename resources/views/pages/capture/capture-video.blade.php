@extends(isset(Auth::user()->id) ? 'layout.authorized.app' : 'layout.app')
@section('title', '')
@section('capture-active', 'kt-menu__item--active')
@section('content')

    <div class="container">
        <div class="kt-portlet">
            <div class="kt-portlet__body">
                <h1 class="display-4">Capture your thoughts and feelings</h1>
                <p><b>Please share your fears, frustrations, and needs
                during this time of crisis, as well as what is helping you to get through it.</b>
                Your recording can range from 30 seconds to 5 minutes.
                It will be transcribed by Google's transcription service,
                and you will be able to view a <b>word cloud</b> created from the transcript.
                You will be able to save the recording for <b>private use
                or share it publicly</b>.
                We hope that you will come back and record more.
                Please avoid using any identifying names or information.</p>

                <p>If you wish to create an audio recording instead,
                <a href="{{ route('capture-audio') }}">click here</a>,
                or if you wish to type some text instead,
                <a href="{{ route('capture-text') }}">click here</a>.</p>

                <h3>Create a video recording</h3>

                <p>(1) Press <b>Request Camera</b> to allow access to your camera.</p>
                <p>(2) Press <b>Start</b> to begin recording
                (and again to delete and re-record).</p>
                <p>(3) Press <b>Stop</b> to end recording.</p>
                <p>(4) Press <b>Save Recording</b> to upload and transcribe the recording.</p>

                <div class="text-center d-flex justify-content-center" id="preview">
                    <div id="spinner" class="d-none kt-spinner kt-spinner--v2 kt-spinner--lg kt-spinner--primary"></div>
                    <video id="live-video" width="270" height="200" muted autoplay="autoplay" class="d-none"></video>
                </div>

                <div>
                    <div id="recordingsList" class="d-none">
                        <h3>Your recording:</h3>
                        <video id='video' controls></video>
                    </div>

                    <div class="text-center">
                        <div class="btn-group mb-3 mt-3">
                            <button id="cameraButton" class="btn btn-primary">
                                <i class="la la-camera"></i> Request Camera
                            </button>
                            <button id="recordButton" class="btn btn-primary d-none">
                                <i class="la la-play"></i> Start
                            </button>
                            <button id="stopButton" class="btn btn-danger">
                                <i class="la la-stop"></i> Stop
                            </button>
                            <button class="btn btn-success d-none" id="uploadInfo" data-toggle="modal" data-target="#uploadModal">Save Recording</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @include('pages.capture.modal')

@endsection

@section('scripts')
    <script src="{{ asset('js/pages/capture-valid.js') }}?time={{ time() }}"></script>
    <script src="{{ asset('js/pages/capture-upload.js') }}?time={{ time() }}"></script>
    <script src="{{ asset('js/pages/capture-video.js') }}?time={{ time() }}"></script>
@endsection
