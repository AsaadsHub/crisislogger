@extends(isset(Auth::user()->id) ? 'layout.authorized.app' : 'layout.app')
@section('title', '')
@section('capture-active', 'kt-menu__item--active')
@section('content')

    <div class="container">
        <div class="kt-portlet">
            <div class="kt-portlet__body">
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
                <h3>Create the text </h3>
                <div>
                    <div id="recordingsList" class="d-none">
                        <h3>Your text:</h3>
                    </div>
                    <form >
                        <div class="form-group">
                            <label for="text-area">Enter text</label>
                            <textarea class="form-control" aria-label="With textarea" name="mind-text"></textarea>
                        </div>
                    </form>
                    <div class="text-center">
                        <div class="btn-group mb-3 mt-3">
                            <button class="btn btn-success d-none" id="uploadInfo" data-toggle="modal" data-target="#uploadModal">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('pages.capture.modal')

@endsection

@section('scripts')
    <script src="{{ asset('js/pages/capture-text.js') }}?time={{ time() }}"></script>
@endsection
