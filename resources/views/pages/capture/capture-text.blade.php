@extends(isset(Auth::user()->id) ? 'layout.authorized.app' : 'layout.app')
@section('title', '')
@section('capture-active', 'kt-menu__item--active')
@section('content')

    <div class="container">
        <div class="kt-portlet">
            <div class="kt-portlet__body">
                <h1 class="display-4">Capture your thoughts and feelings with text</h1>
                <p><b>Please share your fears, frustrations, and needs
                        during this time of crisis, as well as what is helping you to get through it.</b>
                    Feel free to share any additional thoughts or feelings as you see fit.
                    You will be able to save what you type <b>private use
                        or share it publicly</b>.
                    We hope that you will come back and enter more.
                    Please avoid using any identifying names or information.</p>

                <p>If you wish to create a video recording instead,
                <a href="{{ route('capture-video') }}">click here</a>,
                or if you wish to create an audio recording,
                <a href="{{ route('capture-video') }}">click here</a>.</p>


                <h3>Type in the box below </h3>

                <div>
                    <div id="recordingsList" class="d-none">
                        <h3>Your text:</h3>
                    </div>
                    <form >
                        <div class="form-group">
                            <!--label for="text-area">Enter text</label-->
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
