var video, timeoutRequest, reqBtn, recordButton, stream, recorder, uploadBtn;
video = document.getElementById('video');
reqBtn = document.getElementById('cameraButton');
reqBtn.onclick = requestVideo;
recordButton = document.getElementById('button');
videoContainer = document.getElementById('recordingsList');
uploadBtn = document.getElementById('uploadInfo');

let upload = document.getElementById('upload');
let preview = document.getElementById('live-video');
let spinner = document.getElementById('spinner');

let isRecording = false;
const camIcon = `
<svg class="bi bi-camera-video-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
    <path d="M2.667 3h6.666C10.253 3 11 3.746 11 4.667v6.666c0 .92-.746 1.667-1.667 1.667H2.667C1.747 13 1 12.254 1 11.333V4.667C1 3.747 1.746 3 2.667 3z"/>
    <path d="M7.404 8.697l6.363 3.692c.54.313 1.233-.066 1.233-.697V4.308c0-.63-.693-1.01-1.233-.696L7.404 7.304a.802.802 0 000 1.393z"/>
</svg>
`;
const stopIcon = `
<svg id="stop-icon" class="bi bi-stop-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
    <path d="M5 3.5h6A1.5 1.5 0 0112.5 5v6a1.5 1.5 0 01-1.5 1.5H5A1.5 1.5 0 013.5 11V5A1.5 1.5 0 015 3.5z"/>
</svg>
`;
recordButton.addEventListener("click", toggleRecording);

function toggleRecording() {
    if (isRecording) {
        stopRecording();
        isRecording = false;
    } else {
        startRecording();
    }
}

function requestVideo() {

    if (document.getElementById('error-id'))
    {
        document.getElementById('error-id').remove();
    }
    spinner.classList.remove('d-none');
    
    let constraints = {
        audio: true,
        video: {
            width: { min: 320 },
            height: { min: 240 },
            advanced: [
                { width: 320 },
                { width: { min: 320 } },
                { frameRate: 15 },
                { width: { max: 320 } },
                { facingMode: "user" }
            ]
        }
    };

    navigator.mediaDevices.getUserMedia(constraints).then(stm => {
        stream = stm;
        reqBtn.style.display = 'none';
        button.removeAttribute('disabled');
        preview.srcObject = stream;
        preview.captureStream = preview.captureStream || preview.mozCaptureStream;
        preview.classList.remove('d-none');
        spinner.classList.add('d-none');
        recordButton.style.display = "inline-block";
    }).catch(e => {
        if (e)
        {
            let errorMsg = 'We can not find the camera device. please check and try again';
            let error = document.createElement('p');
            error.innerText =  errorMsg;
            error.setAttribute('id', 'error-id');
            error.classList.add('error');
            reqBtn.after(error);
            spinner.classList.add('d-none');
        }
    });
}

function startRecording() {
    console.log('recording started');
    isRecording = true;
    button.innerHTML = stopIcon;
    button.classList.add('recording');

    if ( navigator.vibrate ) navigator.vibrate( 150 );

    preview.classList.remove('d-none');
    recorder = new MediaRecorder(stream, {
        mimeType: 'video/webm'
    });
    recorder.start();

    //limit recording to 5 mins = 300,000 ms
    timeoutRequest = setTimeout(function() {
        console.log('Recording time limit reached')
        stopRecording();
    }, 300000);
}


function stopRecording() {
    console.log('recording stopped');
    isRecording = false;
    button.classList.remove('recording');
    button.innerHTML = camIcon;
    $("#myModal").modal();
    if ( navigator.vibrate ) navigator.vibrate( [ 200, 100, 200 ] );
    const chunks = [];
    preview.classList.add('d-none');
    recorder.ondataavailable = e => {
        chunks.push(e.data);
        video.src = URL.createObjectURL(e.data);

        var blob = new Blob(chunks, {type: 'video/webm'});
        let filename = new Date().toISOString() + ".webm";

        upload.addEventListener('click', async (e) => {
            e.preventDefault();
            uploadButtonClicked(blob, filename);
        });
    };
    recorder.stop();
    clearTimeout(timeoutRequest);
}
