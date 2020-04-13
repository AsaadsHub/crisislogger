var video, reqBtn, startBtn, stopBtn, stream, recorder, uploadBtn;
video = document.getElementById('video');
reqBtn = document.getElementById('cameraButton');
startBtn = document.getElementById('recordButton');
stopBtn = document.getElementById('stopButton');
videoContainer = document.getElementById('recordingsList');
uploadBtn = document.getElementById('uploadInfo');
reqBtn.onclick = requestVideo;
startBtn.onclick = startRecording;
stopBtn.onclick = stopRecording;
startBtn.disabled = true;
stopBtn.disabled = true;
let upload = document.getElementById('upload');
let preview = document.getElementById('live-video');
let spinner = document.getElementById('spinner');

function requestVideo() {
    spinner.classList.remove('d-none');
    navigator.mediaDevices.getUserMedia({
        video: true,
        audio: true
    }).then(stm => {
        stream = stm;
        reqBtn.style.display = 'none';
        startBtn.removeAttribute('disabled');
        preview.srcObject = stream;
        preview.captureStream = preview.captureStream || preview.mozCaptureStream;
        preview.classList.remove('d-none');
        spinner.classList.add('d-none');
        startBtn.classList.remove('d-none');
    }).catch(e => console.error(e));
}

function startRecording() {
    preview.classList.remove('d-none');
    uploadBtn.classList.add('d-none');
    videoContainer.classList.add('d-none');
    recorder = new MediaRecorder(stream, {
        mimeType: 'video/webm'
    });
    recorder.start();
    stopBtn.removeAttribute('disabled');
    startBtn.disabled = true;
    startBtn.innerHTML = "<i class=\"la la-circle\"></i> Recording";
}


function stopRecording() {
    const chunks = [];
    preview.classList.add('d-none');
    recorder.ondataavailable = e => {
        chunks.push(e.data);
        videoContainer.classList.remove('d-none');
        video.src = URL.createObjectURL(e.data);
       // console.log(chunks);

        startBtn.removeAttribute('disabled');
        stopBtn.disabled = true;
        startBtn.innerHTML = "<i class=\"la la-play\"></i> Start";

        var blob = new Blob(chunks, {type: 'video/webm'});
        let filename = new Date().toISOString() + ".webm";
        uploadBtn.classList.remove('d-none');

        upload.addEventListener('click', async (e) => {
            e.preventDefault();
            uploadButtonClicked(blob, filename);
        });
    };
    recorder.stop();
}
