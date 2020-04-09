@extends('layout.app')
@section('title', 'Questionnaire')
@section('description', '')
@section('content')

    {{--<div class="container">
        <form method="POST" action="{{ route('questionnaire_form_upload') }}">
            @csrf

            @include('pages.questionnaire.background')
            @include('pages.questionnaire.exposure')
            @include('pages.questionnaire.life-changes')

            @component('components.form-group')
                <button type="submit" class="btn btn-success">Submit</button>
            @endcomponent
        </form>
    </div>--}}

    <div class="container">
        @component('components.portlet')
            <div class="kt-grid kt-grid--desktop-xl kt-grid--ver-desktop-xl kt-wizard-v3 kt-wizard-v3--extend" id="questionnaire_wizard" data-ktwizard-state="step-first">
                <div class="kt-grid__item kt-wizard-v3__aside">

                    <!--begin: Form Wizard Nav -->
                    <div class="kt-wizard-v3__nav">
                        <div class="kt-wizard-v3__nav-items">
                            <div class="kt-wizard-v3__nav-item" data-ktwizard-type="step" data-ktwizard-state="current">
                                <div class="kt-wizard-v3__nav-body">
                                    <div class="kt-wizard-v3__nav-label">
                                        <span>1</span> Background
                                    </div>
                                    <div class="kt-wizard-v3__nav-bar"></div>
                                </div>
                            </div>
                            <div class="kt-wizard-v3__nav-item" data-ktwizard-type="step">
                                <div class="kt-wizard-v3__nav-body">
                                    <div class="kt-wizard-v3__nav-label">
                                        <span>2</span> Exposure
                                    </div>
                                    <div class="kt-wizard-v3__nav-bar"></div>
                                </div>
                            </div>
                            <div class="kt-wizard-v3__nav-item" data-ktwizard-type="step">
                                <div class="kt-wizard-v3__nav-body">
                                    <div class="kt-wizard-v3__nav-label">
                                        <span>3</span> Life Changes
                                    </div>
                                    <div class="kt-wizard-v3__nav-bar"></div>
                                </div>
                            </div>
                            <div class="kt-wizard-v3__nav-item" data-ktwizard-type="step">
                                <div class="kt-wizard-v3__nav-body">
                                    <div class="kt-wizard-v3__nav-label">
                                        <span>4</span> Submit
                                    </div>
                                    <div class="kt-wizard-v3__nav-bar"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end: Form Wizard Nav -->

                </div>
                <div class="kt-grid__item kt-grid__item--fluid kt-wizard-v3__wrapper">
                    <!--begin: Form Wizard Form-->
                    <form id="QuestionnaireForm" class="kt-form" method="POST" action="{{ route('questionnaire_form_upload') }}">
                        @csrf
                        <!--begin: Form Wizard Step 1-->
                        <div class="kt-wizard-v3__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
                            @include('pages.questionnaire.background')
                        </div>
                        <!--end: Form Wizard Step 1-->

                        <!--begin: Form Wizard Step 2-->
                        <div class="kt-wizard-v3__content" data-ktwizard-type="step-content">
                            @include('pages.questionnaire.exposure')
                        </div>
                        <!--end: Form Wizard Step 2-->

                        <!--begin: Form Wizard Step 3-->
                        <div class="kt-wizard-v3__content" data-ktwizard-type="step-content">
                            @include('pages.questionnaire.life-changes')
                        </div>
                        <!--end: Form Wizard Step 3-->

                        <!--begin: Form Wizard Step 4-->
                        <div class="kt-wizard-v3__content" data-ktwizard-type="step-content">
                            <p>Please ensure the information you have added is correct and to the best of your knowledge.</p>
                            <p>We thank you for your cooperation.</p>
                        </div>
                        <!--end: Form Wizard Step 4-->

                        <!--begin: Form Actions -->
                        <div class="kt-form__actions">
                            <div class="btn btn-secondary btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-prev">
                                <span>
                                    <span>Previous</span>
                                </span>
                            </div>
                            <button type="submit" class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-submit" id="Submit">
                                <span>
                                    <span>Submit</span>
                                </span>
                            </button>
                            <div class="btn btn-info btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-next">
                                <span>
                                    <span>Next Step</span>
                                </span>
                            </div>
                        </div>
                        <!--end: Form Actions -->
                    </form>
                    <!--end: Form Wizard Form-->
                </div>
            </div>
        @endcomponent
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/pages/questionnaire.js') }}"></script>
@endsection

@section('styles')
    <link href="{{ asset('css/pages/wizard/wizard-3.css') }}" rel="stylesheet" type="text/css">
@endsection
