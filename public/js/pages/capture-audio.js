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
let timeoutRequest;
let lastStartTime;
let timeRemaining;
let recordButton = document.getElementById("recordButton");
let stopButton = document.getElementById("stopButton");
let pauseButton = document.getElementById("pauseButton");
let recordingsList = document.getElementById("recordingsList");
let upload = document.getElementById('upload');
let upload_info = document.getElementById('uploadInfo');
//add events to those 3 buttons
recordButton.addEventListener("click", startRecording);
stopButton.addEventListener("click", stopRecording);
pauseButton.addEventListener("click", pauseRecording);

function startRecording(){
    //console.log('recording clicked');

    // Remove the old recording, if we are re-recording
    recordingsList.innerHTML = '';
    upload_info.classList.add('d-none');

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
        recordButton.innerHTML = "<i class=\"la la-circle\"></i> Recording";

        lastStartTime = new Date().getTime();
        //limit recording to 5 mins = 300,000 ms
        timeRemaining = 300000;
        timeoutRequest = setTimeout(function() {
            if (!stopButton.disabled) {
                this.stopRecording();
            }
        }, timeRemaining);
    }).catch(function(err) {
        //enable the record button if getUserMedia() fails
        recordButton.disabled = false;
        stopButton.disabled = true;
        pauseButton.disabled = true;
    });
}

function pauseRecording(){
    console.log("pauseButton clicked rec.recording=", rec.recording);
    if (rec.recording) {
        //pause
        rec.stop();
        pauseButton.innerHTML = "<i class=\"la la-play\"></i> Resume";

        //update time remaining
        const currentTime = new Date().getTime();
        const timeElapsed = currentTime - lastStartTime;
        timeRemaining = timeRemaining - timeElapsed;
        clearTimeout(timeoutRequest);

    } else {
        //resume
        rec.record();
        pauseButton.innerHTML = "<i class=\"la la-pause\"></i> Pause";

        lastStartTime = new Date().getTime();
        timeoutRequest = setTimeout(function() {
            if (!stopButton.disabled) {
                this.stopRecording();
            }
        }, timeRemaining);
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
    // reset the start button
    recordButton.innerHTML = "<i class=\"la la-play\"></i> Start";
    //tell the recorder to stop the recording
    rec.stop(); //stop microphone access
    gumStream.getAudioTracks()[0].stop();
    //create the wav blob and pass it on to createDownloadLink
    rec.exportWAV(createDownloadLink);

    clearTimeout(timeoutRequest);
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
    link.innerHTML = '<i class="flaticon-download flaticon"></i>';
    link.classList.add('download-link');
    //add the new audio and a elements to the li element
    li.appendChild(au);
    li.appendChild(link);

    let filename = new Date().toISOString();
    //filename to send to server without extension
    upload.addEventListener('click', async (e) => {
        e.preventDefault();
        uploadButtonClicked(blob, filename);
    });

    recordingsList.appendChild(li);
    recordingsList.classList.remove('d-none');
    upload_info.classList.remove('d-none');
}

