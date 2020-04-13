@extends('layout.app')
@section('title', 'Capture Thoughts')
@section('content')

    <div class="container content">
        <h1 class="display-4">Capture Your Thoughts on COVID-19</h1>
        <p>You can record via your computer or phone microphone/camera your thoughts, concerns on COVID-19.</p>
        <p>After you record your thoughts, you can upload them and create an optional account to view your uploaded files.</p>

        <div id="recordingsList" class="d-none">
            <h3>Your recording:</h3>

        </div>

        <div class="btn-group mb-2">
            <button id="recordButton" class="btn btn-success">
                <i class="la la-play"></i> Start
            </button>
            <button id="pauseButton" class="btn btn-outline-primary">
                <i class="la la-pause"></i> Pause
            </button>
            <button id="stopButton" class="btn btn-danger">
                <i class="la la-stop"></i> Stop
            </button>
        </div>

        <p>If you wish to re-record your thoughts, please press start again. Your old recording will be replaced.</p>


        <div id="upload" class="d-none">
            <button class="btn btn-success">Upload File</button>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="https://cdn.rawgit.com/mattdiamond/Recorderjs/08e7abd9/dist/recorder.js"></script>
    <script>
        //webkitURL is deprecated but nevertheless
        URL = window.URL || window.webkitURL;
        let gumStream;
        //stream from getUserMedia()
        let rec;
        //Recorder.js object
        let input;
        //MediaStreamAudioSourceNode we'll be recording
        // shim for AudioContext when it's not avb.
        let AudioContext = window.AudioContext || window.webkitAudioContext;
        let audioContext = new AudioContext;
        //new audio context to help us record
        let recordButton = document.getElementById("recordButton");
        let stopButton = document.getElementById("stopButton");
        let pauseButton = document.getElementById("pauseButton");
        let recordingsList = document.getElementById("recordingsList");
        let upload = document.getElementById('upload');
        //add events to those 3 buttons
        recordButton.addEventListener("click", startRecording);
        stopButton.addEventListener("click", stopRecording);
        pauseButton.addEventListener("click", pauseRecording);

        function startRecording(){
            console.log('recording clicked');

            // Remove the old recording, if we are re-recording
            recordingsList.innerHTML = '';
            upload.classList.add('d-none');

            /* Simple constraints object, for more advanced audio features see

https://addpipe.com/blog/audio-constraints-getusermedia/ */

            let constraints = {
                audio: true,
                video: false
            };
            /* Disable the record button until we get a success or fail from getUserMedia() */

            recordButton.disabled = true;
            stopButton.disabled = false;
            pauseButton.disabled = false;

            /* We're using the standard promise based getUserMedia()

            https://developer.mozilla.org/en-US/docs/Web/API/MediaDevices/getUserMedia */

            navigator.mediaDevices.getUserMedia(constraints).then(function(stream) {
                console.log("getUserMedia() success, stream created, initializing Recorder.js ...");
                /* assign to gumStream for later use */
                gumStream = stream;
                /* use the stream */
                input = audioContext.createMediaStreamSource(stream);
                /* Create the Recorder object and configure to record mono sound (1 channel) Recording 2 channels will double the file size */
                rec = new Recorder(input, {
                    numChannels: 1
                })
                //start the recording process
                rec.record()
                console.log("Recording started");
            }).catch(function(err) {
                //enable the record button if getUserMedia() fails
                recordButton.disabled = false;
                stopButton.disabled = true;
                pauseButton.disabled = true
            });
        }

        function pauseRecording(){
            console.log("pauseButton clicked rec.recording=", rec.recording);
            if (rec.recording) {
                //pause
                rec.stop();
                pauseButton.innerHTML = "<i class=\"la la-play\"></i> Resume";
            } else {
                //resume
                rec.record();
                pauseButton.innerHTML = "<i class=\"la la-pause\"></i> Pause";
            }
        }

        function stopRecording() {
            console.log("stopButton clicked");
            //disable the stop button, enable the record too allow for new recordings
            stopButton.disabled = true;
            recordButton.disabled = false;
            pauseButton.disabled = true;
            //reset button just in case the recording is stopped while paused
            pauseButton.innerHTML = "<i class=\"la la-pause\"></i> Pause";
            //tell the recorder to stop the recording
            rec.stop(); //stop microphone access
            gumStream.getAudioTracks()[0].stop();
            //create the wav blob and pass it on to createDownloadLink
            rec.exportWAV(createDownloadLink);
        }

        function createDownloadLink(blob) {
            let url = URL.createObjectURL(blob);
            let au = document.createElement('audio');
            let li = document.createElement('div');
            let link = document.createElement('a');
            //add controls to the <audio> element
            au.controls = true;
            au.src = url;
            //link the a element to the blob
            link.href = url;
            link.download = new Date().toISOString() + '.wav';
            link.innerHTML = link.download;
            //add the new audio and a elements to the li element
            li.appendChild(au);
            li.appendChild(link);

            //add the li element to the ordered list
            let filename = new Date().toISOString();
            //filename to send to server without extension
            upload.addEventListener('click', async (e) => {
                e.preventDefault();
                let fd = new FormData();
                fd.append("audio_data", blob, filename);

                axios.post('{{ route('upload') }}', fd, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }).then(response => {
                    console.log(response);
                    let data = response.data;
                    swal.fire(data.message);
                }).catch(error => {
                    console.log(error.response);
                    let data = error.response.data;
                    swal.fire({
                        type: 'error',
                        title: 'Something went wrong.',
                        text: data.message
                    });
                });

            });

            recordingsList.appendChild(li);
            recordingsList.classList.remove('d-none');
            upload.classList.remove('d-none');
        }

    </script>
@endsection
