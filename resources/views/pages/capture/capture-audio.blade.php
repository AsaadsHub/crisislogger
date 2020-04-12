@extends(isset(Auth::user()->id) ? 'layout.authorized.app' : 'layout.app')
@section('title', 'Capture Thoughts')
@section('capture-active', 'kt-menu__item--active')
@section('content')

    <div class="container">
        <div class="kt-portlet">
            <div class="kt-portlet__body">
                <h1 class="display-4">Capture your thoughts and feelings</h1>
                <p><b>Please share your fears, frustrations, and needs 
                during this time of crisis, as well as what is helping you to get through it.</b> 
                Feel free to share any additional thoughts or feelings as you see fit.
                Your recording can range from 30 seconds to 5 minutes.
                It will be transcribed by Google's transcription service,
                and you will be able to view a <b>word cloud</b> created from the transcript.
                You will be able to save the recording for <b>private use
                or share it publicly</b>.
                We hope that you will come back and record more.
                Please avoid using any identifying names or information.
                <font color="red">NOTE: You must enter your email address
                at the end for us to be able to log your recording.</font></p>
                <h3>Create an audio recording</h3>
                <p>If you wish to create a video recording instead,
                <a href="{{ route('capture-video') }}">click here.</a></p>
                <p>(1) Press <b>Start</b> to begin recording
                (and again to delete and re-record).</p>
                <p>(2) Press <b>Stop</b> to end recording.</p>
                <p>(3) Press <b>Save Recording</b> to upload and transcribe the recording.</p>

                <div>
                    <div id="recordingsList" class="d-none">
                        <h3>Your video:</h3>
                    </div>

                    <div class="text-center">
                        <div class="btn-group mb-3 mt-3">
                            <button id="recordButton" class="btn btn-primary">
                                <i class="la la-play"></i> Start
                            </button>
                            <button id="pauseButton" class="btn btn-outline-primary">
                                <i class="la la-pause"></i> Pause
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
    <script src="{{ asset('js/recorder.js') }}"></script>
    <script src="{{ asset('js/pages/capture-valid.js') }}?time={{ time() }}"></script>
    <script src="{{ asset('js/pages/capture-upload.js') }}?time={{ time() }}"></script>
    <script src="{{ asset('js/pages/capture-audio.js') }}?time={{ time() }}"></script>
@endsection
