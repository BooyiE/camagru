var canvas = document.getElementById('canvas'),
    context = canvas.getContext('2d'),
    video = document.getElementById('video'),
    capture = document.getElementById('photo-button'),
    pic = document.getElementById('img');

(function(){
    navigator.getMedia = navigator.getUserMedia ||
                         navigator.webkitGetUserMedia ||
                         navigator.mozGetUserMedia ||
                         navigator.msGetUserMedia;

    navigator.getMedia({
        video: true,
        audio: false
        
    }, function(stream){
        video.srcObject = stream;
        video.play();
    }, function(error){
        //An error occured
        console.log('I don\'t want you to use my camera');
    });

    capture.addEventListener('click', function () {
        context.drawImage(video, 0, 0, 400, 300);
        pic.value = canvas.toDataURL('image/png');
    }, false);

    document.getElementById('clear-button').addEventListener('click', function () {
        context.clearRect(0, 0, canvas.width, canvas.height);
    });
    
})();

function addSticker(id, num){
    let sticker = document.getElementById(id);
    context.drawImage(sticker, num, num, 150, 150);
    pic.value = canvas.toDataURL('image/png');
}