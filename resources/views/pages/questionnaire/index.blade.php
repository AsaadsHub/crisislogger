@extends('layout.app')
@section('title', '')
@section('description', '')
@section('content')

    <div class="container">
        <form method="POST" action="{{ route('questionnaire_form_upload') }}">
            @csrf

            {{-- Background information --}}
            @include('pages.questionnaire.background')

            {{-- Exposure status --}}
            @include('pages.questionnaire.exposure')

            {{-- Life changes --}}
            @include('pages.questionnaire.life-changes')

            @component('components.form-group')
                <button type="submit" class="btn btn-success">Submit</button>
            @endcomponent
        </form>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/pages/questionnaire.js') }}"></script>
@endsection
