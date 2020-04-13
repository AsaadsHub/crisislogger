const videoButton = document.getElementById('videoButton');
const isUsingSafari = /constructor/i.test(window.HTMLElement) || (function (p) { return p.toString() === "[object SafariRemoteNotification]"; })(!window['safari'] || (typeof safari !== 'undefined' && safari.pushNotification));

if (isUsingSafari) {
    alert('Video recording on safari is not supported -- Please record audio instead, or use a different browser such as Chrome or Firefox.');
    videoButton.href = '#';
    videoButton.classList.add('disabled');
}
