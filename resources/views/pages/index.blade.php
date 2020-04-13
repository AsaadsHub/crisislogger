@extends('layout.app')
@section('title', '')
@section('description', '')
@section('content')

    <div class="container content pt-0">

        <!--img src="{{ asset('media/photos/covid.jpg') }}" alt=""-->
        <img src="{{ asset('media/photos/parentlogger.png') }}" alt="">

        <div class="text-center">
            <h1 class="display-4">Child Mind Audio/Video Diary</h1>
        </div>

	<br>

        <p>Thank you for helping us to understand your family's experience
        and needs better. You were redirected here to share your experiences during
        this COVID-19 crisis. As parents, we are facing unique challenges with working
        from home while simultaneously juggling home life. At the same time,
        our children are trapped indoors, cut off from their friends, and the routine
        and structure of a school day have been entirely disrupted.</p>

        <p>The Child Mind Institute, the Child Mind Medical Practice, and its partners*
        are deeply committed to mental health, and we are here to listen.
        We are launching an important research project,
        and hope you will share your fears,
        frustrations, and hopes with us in an audio or video clip
        by clicking the link below.</p>

        <p><b>Child Mind Medical Practice and Healthy Brain Network parents only at this time</b>:</p>
        @if (!Auth::check())
            <p class="mt-4"><b>REQUIRED: Fill in your email</b> to ensure that your recording is connected to you.  You may optionally enter a name and password to create an account to come back and see your recordings and word clouds.</p>
        @endif
        <div class="col-lg-6 col-md-8 col-xs-12" id="share-thought-form">
            @if (!Auth::check())
            <form action="{{route('capture', ['voice'=> 'parent'])}}" method="post">
                @csrf

                <div class="form-group">
                    <label>Email address<span class="text-danger">*</span></label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror"  value="{{old('email')}}" aria-describedby="emailHelp" name="email" required placeholder="Enter email">
                    <span class="form-text text-muted">We'll never share your email with anyone else.</span>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div >
                    <button type="submit" class="btn-primary btn btn-wide btn-lg">Share Your Thoughts</button>
                </div>
            </form>
            @else
            <a class="btn-primary btn btn-wide btn-lg" href="{{route('capture', ['voice'=> 'parent'])}}">Share Your Thoughts</a>
            @endif
        </div>
	<br>

        <p>You can share your recording publicly in its original form
        or as a transcript, or decide to keep it private,
        and even create a journal for yourself over time.</p>

        <p>For those who choose to contribute their recordings to scientific
        research, we will analyze them to create recommendations for
        how clinicians and researchers can best support
        families as we move ahead.</p>

        <p>We know how precious your time is, and greatly appreciate
        your participation in this project.</p>

        <p>*Our list of partners is growing, and presently includes
        the National Institute of Mental Health,
        <a href="https://openhumans.org">Open Humans</a>,
        the <a href="https://cri-paris.org">CRI</a> in Paris, and
        <a href="https://mcgovern.mit.edu/profile/satrajit-ghosh/">Satrajit Ghosh</a>
        and Sanu Abraham at MIT.

    </div>

@endsection
