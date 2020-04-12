@extends(isset(Auth::user()->id) ? 'layout.authorized.app' : 'layout.app')
@section('title', 'Choose Recording Method')
@section('capture-active', 'kt-menu__item--active')
@section('content')

    <div class="container">
        <div class="kt-portlet">
            <div class="kt-portlet__body">
                <h1 class="display-4">How would you like to capture your thoughts?</h1>
                <div class="text-center">
                    <a href="{{ route('capture-audio') }}?voice={{ $_GET['voice'] ?? '' }}" class="btn btn-primary btn-wide mr-5 btn-lg">Audio</a>
                    <a id="videoButton" href="{{ route('capture-video') }}?voice={{ $_GET['voice'] ?? '' }}" class="btn btn-primary btn-wide btn-lg">Video</a>
                    <a  href="{{ route('capture-text') }}?voice={{ $_GET['voice'] ?? '' }}&type=text" class="btn ml-5 btn-primary btn-wide btn-lg">Text</a>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/pages/choose-method.js') }}?time={{ time() }}"></script>
@endsection
