@extends('layout.app')
@section('title', 'Home')
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
 
        <div class="text-center">
            <a href="https://parentlogger.org/capture?voice=parent" class="btn-primary btn btn-wide btn-lg">Share Your Thoughts</a>
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
